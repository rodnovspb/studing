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
let count = 0
app.get('/', function(req, res) {
        count++
        if(!req.session.test){
            req.session.test = 'записанные данные'
            res.send('Первый заход, записываю данные сессии')
        }
        else if(req.session.test && count==2){
            res.send('второй заход, показываю: ' + req.session.test)
        }
        else if(count==3){
            delete req.session.test
            count=0
            res.send('Сессия удалена')
        }

});












app.use(function (req, res) {
  res.status(404).send('error')
})



















app.listen(3000, function() {

});