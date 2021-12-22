import express from 'express';
let app = express();

// node index.js

app.get('/1.html/', function (req, res) {
  res.send('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum facere impedit laboriosam perspiciatis quae reprehenderit similique tempora. Aliquam animi eius ipsam neque obcaecati placeat quae quos similique voluptates! Alias aspernatur assumenda dolorum eaque eius, esse impedit ipsa itaque laboriosam maiores neque nulla odio provident quae sit? Aliquam, nesciunt nostrum? Eaque?')
})
app.get('/2.html', function (req, res) {
  res.send('вторая страница')
})
app.use(function (req, res) {
  res.status(404).send('error')
})

app.listen(3000, function() {

});