import fs from 'fs'
import __dirname from './__dirname.js';
import {constants} from 'fs'
import {createGzip} from 'zlib'
import http from 'http'

// node index.js

let i=30
http.createServer((request, response) => {
let text
  let status = 200
  if(request.url=='/page1'){
    text='text1'
  }
  else if(request.url=='/page2'){
    text='text2'
  }
  else if(request.url=='/page3'){
    text='text3'
  }
  else {
    text='page not found'
    status=404
  }
  response.writeHead(status, {'Content-Type': 'text/html'})
  response.write("<h1>"+text+"</h1>")
  response.end()


}).listen(3000);


