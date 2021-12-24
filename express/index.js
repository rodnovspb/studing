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

let titles = {
  index:    'главная страница',
  about:    'о нас',
  conctacs: 'контакты',
  price:    'наш прайс'
}

app.get('/:page', function (req, res) {
  res.render(req.params.page, {title: titles[req.params.page]})
})




















app.listen(3000, function() {

});