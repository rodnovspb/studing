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

app.get('/page', function (req, res) {
   res.render('page1', {a: "https://lenta.ru/", b: "ссылка"})
})




















app.listen(3000, function() {

});