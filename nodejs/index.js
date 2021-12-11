import fs from 'fs'
import __dirname from './__dirname.js';
import {constants} from 'fs'
import {createGzip} from 'zlib'
import http from 'http'

// node index.js


http.createServer((request, response)=>{
  let text
  let status = 200
  let obj = {
    '/page1': '1',
    '/page2': '2',
    '/page3': '3',
  }

  switch (request.url) {
    case '/page1' : text = obj['/page1']
      break
    case '/page2' : text = obj['/page2']
      break
    case '/page3' : text = obj['/page3']
      break
    default : text = "not found"
              status = 404
      break
  }

  response.writeHead(status, {"Content-Type": "text/html"})
  response.write("<h1>"+text+"</h1>")
  response.end()

}).listen(3000)

