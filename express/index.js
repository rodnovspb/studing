import express from 'express';
import __dirname from './__dirname.js';
let app = express();

// node index.js


app.get('/test/show/all/', function(req, res) {
  res.send('all')
});

app.get('/test/show/:num/', function(req, res) {
  res.send('/test/show/:num/')
});

app.get('/test/:num1/:num2', function(req, res) {
  res.send('/test/:num1/:num2')
});










app.use(function (req, res) {
  res.status(404).send('error 404')
})



app.listen(3000, function() {

});