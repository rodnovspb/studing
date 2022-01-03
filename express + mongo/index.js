import expressHandlebars from 'express-handlebars';
const handlebars = expressHandlebars.create({
  defaultLayout: 'main',
  extname: 'hbs'
});

import express from 'express';
let app = express();

app.engine('hbs', handlebars.engine);
app.set('view engine', 'hbs');

import mongodb from 'mongodb';
let mongoClient = new mongodb.MongoClient('mongodb://localhost:27017/', {
  useUnifiedTopology: true
});

// node index.js

mongoClient.connect(async function (error, mongo) {

if(!error) {
  let coll = mongo.db('test').collection('users')

 app.get('/users/:name', async function (req, res) {
    let name = req.params.name
    let user = await coll.findOne({name : name})
    if(user){
      res.render('user', {user: user})
    }
    else {
      res.render('error')
    }


 })
  app.get('/users', async function (req, res) {
    let users = await coll.find().toArray()
    res.render('users', {users: users})
  })
}

else {
  console.log(error)
}


})



app.listen(3000, function () {

})