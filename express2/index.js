import expressHandlebars from 'express-handlebars';
import expressSession from 'express-session';
import cookieParser from 'cookie-parser';
import bodyParser from 'body-parser';
import __dirname from './__dirname.js';
const handlebars = expressHandlebars.create({
    defaultLayout: 'main',
    extname: 'hbs',
    helpers: {

    }})

import express from 'express';
let app = express();

app.engine('hbs', handlebars.engine);
app.set('view engine', 'hbs');

app.use(bodyParser.urlencoded({extended: true}));
// node index.js

let secret = 'qwerty';
app.use(cookieParser(secret));
app.use(expressSession({
    secret: secret,
}));



app.get('/', function (req, res) {
    if(!req.session.try){
        req.session.try = 'зафиксирована попытка входа ранее'
        res.send('первое посещение, сессия записана')
    }
    else {
        let a = req.session.try
        delete req.session.try
        res.send(a + '<br> Второе посещение, сессия удалена')
    }
})










app.use(function (req, res) {
  res.status(404).send('error')
})



















app.listen(3000, function() {

});