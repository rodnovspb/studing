import express from 'express';
import __dirname from './__dirname.js';
let app = express();

// node index.js

let employees = [
  {
    surname: 'surname1',
    name:    'user1',
    salary:  1000,
  },
  {
    surname: 'surname2',
    name:    'user2',
    salary:  2000,
  },
  {
    surname: 'surname3',
    name:    'user3',
    salary:  3000,
  },
];

app.get("/", function (req, res) {
  let a = "<table>"
  for(let elem of employees){
    a+="<tr><td>" + elem.name + "</td><td>"  + elem.surname + "</td><td>" + elem.salary + "</td></tr>"
  }
  a+="</table>"
  res.send(a)
})






app.use(function (req, res) {
  res.status(404).send('error 404')
})



app.listen(3000, function() {

});