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
    res.render('form')
})
app.post('/', function (req, res) {
  let arr = req.body.text.split('')
  let obj = countSymb(arr)
  let commonArr = createArrfromObg(obj)
  res.render('form', {
    body: req.body,
    key: commonArr[0],
    value: commonArr[1]
  })
})

function countSymb(arr) {
  let obj = {}
  for(let elem of arr){
    if(obj[elem]){
      obj[elem]++
    }
    else if(!obj[elem]){
      obj[elem] = 1
    }
  }
  return obj
}

function createArrfromObg(obj){
  let arr1 = []
  let arr2 = []
  for(let elem in obj){
    arr1.push(elem)
    arr2.push(obj[elem])
  }
  let sum = 0
  for(let elem of arr2){
    sum += Number(elem)
  }
  for(let i = 0; i<arr2.length; i++){
    arr2[i] = Math.round((arr2[i]/sum)*100)
  }
  return [arr1, arr2]
}









app.use(function (req, res) {
  res.status(404).send('error')
})



















app.listen(3000, function() {

});