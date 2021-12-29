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


let time
app.get('/', function (req, res) {
    if(!time){
        time = new Date().getTime()
        res.cookie('time', time)
        res.send('Первое посещение, время записано')
    }
    else {
        let time2 = new Date().getTime()
        let firsTime = req.cookies['time']
        let differ = (time2 - firsTime)/1000
        res.cookie('time', time2)
        res.send("Прошло " + differ + ' секунд')
        // После res.send код с res не выполняется
    }
})












app.use(function (req, res) {
  res.status(404).send('error')
})



















app.listen(3000, function() {

});