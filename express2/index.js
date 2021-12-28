import expressHandlebars from 'express-handlebars';
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


app.get('/', function (req, res) {
    let horoscope
    if(req.query.submit){
       horoscope = getHoroscope(req.query.date)
    }
    res.render('form', {
        query: req.query,
        horoscope
    })
})

let Horoscope = {
    'ves': ['весы плохо', 'весы нормально', "весы хорошо"],
    'rak': ['рак плохо', 'рак нормально', "рак хорошо"],
    'deva': ['дева плохо', 'дева нормально', "дева хорошо"],
    'scorp': ['скорпион плохо', 'скорпион нормально', "скорпион хорошо"]
}
function getHoroscope (date){
    let horoscope
    let arr = date.split('-')
    let month = arr[1]
    let day = arr[2]
    let date1 = month + '.'+day
    if(date1>='00.01' && date1<='03.31'){
        horoscope='ves'
    }
    else if(date1>'03.31' && date1<='06.31'){
        horoscope='rak'
    }
    else if(date1>'06.31' && date1<='09.31'){
        horoscope='deva'
    }
    else if(date1>'09.31' && date1<='11.31'){
        horoscope='scorp'
    }
    return Horoscope[horoscope][1]
}









app.use(function (req, res) {
  res.status(404).send('error')
})



















app.listen(3000, function() {

});