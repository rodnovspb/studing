import express from 'express';
import __dirname from './__dirname.js';
import fs from 'fs/promises'
import { constants } from 'fs';
let app = express();

// node index.js


app.get('/page/:num', function (req, res) {
    let path = __dirname + '/pages/' + req.params.num + '.html'
    fs.access(path, constants.F_OK).then(()=>
    res.sendFile(path)
    ).catch((e)=>{res.status(404).send('error')})
})












app.use(function (req, res) {
    res.status(404).send('error')
})



app.listen(3000, function() {

});