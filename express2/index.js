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
  let a = Number(req.query.num1)
  let b = Number(req.query.num2)
  let c = Number(req.query.num3)
 let pifNumber = isPifagorNumber(a,b,c)
  res.render('form', {
    query: pifNumber,
    query1: req.query
  })
})

function isPifagorNumber(a,b,c){
  if(a>b && a>c){
    return a**2==b**2+c**2
  }
  else if(b>a && b>c) {
    return b ** 2 == a ** 2 + c ** 2
  }
  else if(c>a && c>b) {
    return c ** 2 == a ** 2 + b ** 2
  }
}













app.use(function (req, res) {
  res.status(404).send('error')
})



















app.listen(3000, function() {

});