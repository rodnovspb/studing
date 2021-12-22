import express from 'express';
import __dirname from './__dirname.js';
let app = express();

// node index.js


let users = ['user1', 'user2', 'user3', 'user4', 'user5'];

for(let i=0; i<users.length; i++){
  app.get("/"+i+"/", function (req, res) {
    res.send(users[i])
  })
}



app.use(function (req, res) {
  res.status(404).send('error 404')
})



app.listen(3000, function() {

});