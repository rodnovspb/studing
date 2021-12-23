import express from 'express';
import __dirname from './__dirname.js';
import fs from 'fs/promises'
import { constants } from 'fs';
let app = express();

// node index.js

app.get('/city/show/:id', function(req, res) {

});
app.get('/city/edit/:id', function(req, res) {

});
app.get('/country/list', function(req, res) {

});
app.get('/country/show/:id', function(req, res) {

});
app.get('/country/edit/:id', function(req, res) {

});

let userRouter1 = express.Router()
let userRouter2 = express.Router()

userRouter1.get('/show/:id', function (req, res) {

})
userRouter1.get('/edit/:id', function (req, res) {

})

userRouter2.get('/list', function (req, res) {

})
userRouter2.get('/show/:id', function (req, res) {

})
userRouter2.get('/edit/:id', function (req, res) {

})

app.use('/city/', userRouter1)
app.use('/country/', userRouter2)









app.use(function (req, res) {
    res.status(404).send('error')
})



app.listen(3000, function() {

});