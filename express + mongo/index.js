import expressHandlebars from 'express-handlebars';
import bodyParser from 'body-parser';
const handlebars = expressHandlebars.create({
  defaultLayout: 'main',
  extname: 'hbs'
});

import express from 'express';
let app = express();

app.engine('hbs', handlebars.engine);
app.set('view engine', 'hbs');
app.use(bodyParser.urlencoded({extended: true}));

import mongodb from 'mongodb';
let mongoClient = new mongodb.MongoClient('mongodb://localhost:27017/', {
  useUnifiedTopology: true
});


// node index.js

mongoClient.connect(async function (error, mongo) {
  let coll = mongo.db('test').collection('users')
  let collProd = mongo.db('test').collection('prods')


if(!error) {
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

  app.get('/users/delete/:name', async function (req, res) {
      let user = req.params.name
      await coll.deleteOne({name: user})
      res.send('удален')
  })

  app.get('/users/edit/:name', async function (req, res) {
    let name = req.params.name
    let user = await coll.findOne({name: name})
    if(user){
      res.render('edit', {name: user.name, salary: user.salary})
    }
    else {
      res.render('error')
    }

  })

  app.post('/users/edit/:name', async function (req, res) {
    let user = req.body
    await coll.updateOne({name: user.name}, {$set: user})
    res.send('Юзер обновлен')
  })

  app.get('/prods/edit/:name', async function (req, res) {
    let name = req.params.name
    let prod = await collProd.findOne({name: name})
    if(prod){
      res.render('editProd', {prod})
    }
    else {
      res.render('error')
    }

  })

  app.post('/prods/edit/:name', async function (req, res) {
    let prod = await req.body
    await collProd.updateOne({name: prod.name}, {$set: prod})
    res.redirect('/prods')
  })

  app.get('/prods/:num', async function (req, res) {
    let num = req.params.num
    let prod = await collProd.findOne({name: num})
    if(prod){
      res.render('prod', {name: prod})
    }
    else {
      res.render('error')
    }
  })
  app.get('/prods', async function (req, res) {
    let prods = await collProd.find().toArray()
    res.render('prods', {prods})
  })

  app.get('/prods/delete/:name', async function (req, res) {
    let prod = req.params.name
    await collProd.deleteOne({name: prod})
    res.render('delete', {name: prod})

  })
  app.get('/user/add', function (req, res) {
    res.render('add')
  })
  app.post('/user/add', async function (req, res) {
      let data = req.body
      await coll.insertOne(data)
      res.send('юзер успешно добавлен')
  })

  app.get('/prod/add', function (req, res) {
    res.render('addProd')
  })
  app.post('/prod/add', async function (req, res) {
    let prod = req.body
    await collProd.insertOne(prod)
    res.redirect('/prods')
  })




}

else {
  console.log(error)
}


})



app.listen(3000, function () {

})