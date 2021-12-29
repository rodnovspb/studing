import expressHandlebars from 'express-handlebars';
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

let secret = 'qwerty'
app.use(cookieParser(secret))

app.get('/main', function (req, res) {
    res.cookie('main', 'куки для главной страницы', {
        path: '/main',
        maxAge: 1000*60*60*24*365*10
    })
    res.send(req.cookies['main'])
})

app.get('/page', function (req, res) {
    res.send(req.cookies['main'])
})











app.use(function (req, res) {
  res.status(404).send('error')
})



















app.listen(3000, function() {

});