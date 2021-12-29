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
    req.session.test = 'моя сессия'
    res.send('первый заход, сессия записана, перейдите на /page')
})
app.get('/page', function (req, res) {
    res.send('второй заход, передаю данные' + req.session.test + "<br> Для удаления пройдите на /delete")
})
app.get('/delete', function (req, res) {
    delete req.session.test
    res.send('Третий заход, сессия удалена, перейдите на главную')
})












app.use(function (req, res) {
  res.status(404).send('error')
})



















app.listen(3000, function() {

});