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

app.get('/write', function (req, res) {
    res.cookie('myCookies', 'мои куки')
    res.send('записываю куки')
})

app.get('/read', function (req, res) {
    res.cookie('myCookies', 'мои куки')
    res.send('Читаю куки:' + req.cookies['myCookies'])
})
app.get('/delete', function (req, res) {
    res.clearCookie('myCookies')
    res.send('Удаляю куки')
})








app.use(function (req, res) {
  res.status(404).send('error')
})



















app.listen(3000, function() {

});