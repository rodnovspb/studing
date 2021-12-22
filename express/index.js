import express from 'express';
let app = express();

// node index.js

app.get('/1/', function (req, res) {
  res.send('page1')
})
app.get('/2/', function (req, res) {
  res.send('page2')
})

app.use(function (req,res) {
  res.status(404).send('404 ошибка')
})

app.listen(3000, function() {

});