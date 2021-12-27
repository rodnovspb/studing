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
  let timeToBirth
  if(req.query.text){
    timeToBirth = defineTimetoBirth(req.query.text)
  }

  res.render('form', {
    query: req.query,
    time: timeToBirth
  })
})

function defineTimetoBirth(date){
  let differ
  let arr = date.split('.')
  let now = new Date()
  let thisYear = now.getFullYear()
  let year = ~~arr[2]
  let month = ~~arr[1]
  let day = ~~arr[0]
  let birth = new Date(thisYear, month-1, day)
  if(birth>now){
    differ = (birth-now)/1000/60/60/24

  }
  else if(now>birth){
    let nextBirth = new Date(thisYear+1, month, day)
    differ = (nextBirth-now)/1000/60/60/24
  }
  return Math.round(differ)
}












app.use(function (req, res) {
  res.status(404).send('error')
})



















app.listen(3000, function() {

});