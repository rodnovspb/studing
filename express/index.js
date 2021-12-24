import expressHandlebars from 'express-handlebars';
import __dirname from './__dirname.js';
const handlebars = expressHandlebars.create({
    defaultLayout: 'main',
    extname: 'hbs'
});

import express from 'express';
let app = express();

app.engine('hbs', handlebars.engine);
app.set('view engine', 'hbs');

// node index.js



app.get('/', function (req, res) {
  res.render('page', {
    test: "data",
    layout: 'mypage1'
  });
})





app.use(function (req, res) {
  res.status(404).send('error')
})



















app.listen(3000, function() {

});