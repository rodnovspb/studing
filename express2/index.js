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
    let time = new Date(Number(req.query.year), Number(req.query.month),Number(req.query.day))
    let dayOfWeek
    switch (~~time.getDay()) {
        case 0: dayOfWeek='воскр'; break;
        case 1: dayOfWeek='пон'; break;
        case 2: dayOfWeek='втор'; break;
        case 3: dayOfWeek='среда'; break;
        case 4: dayOfWeek='четв'; break;
        case 5: dayOfWeek='пятн'; break;
        case 6: dayOfWeek='сб'; break;
        default: dayOfWeek='ошибка'; break;
    }
    res.render('form', {
        day: dayOfWeek,
        query: req.query
    })
})










app.use(function (req, res) {
  res.status(404).send('error')
})



















app.listen(3000, function() {

});