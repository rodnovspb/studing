import fs from 'fs'
import __dirname from './__dirname.js';
import {constants} from 'fs'
import {createGzip} from 'zlib'
import http from 'http'

// node index.js

http.createServer(async (request, response)=>{
  let data
  let status = 200
  let type

  if(request.url=='/favicon.ico'){
    data = await fs.promises.readFile('favicon.ico')
    type = "image/x-icon"
  }
  else if(request.url=="/1.html"){
    data = await fs.promises.readFile('1.html', 'utf8')
    type = 'text/html'
  }
  else if(request.url=="/math.js"){
    data = await fs.promises.readFile('math.js')
    type = 'text/javascript'
  }
  else if(request.url=="/img.png"){
    data = await fs.promises.readFile('img.png')
    type = 'image/png'
  }
  else if(request.url=="/style.css"){
    data = await fs.promises.readFile('style.css')
    type = 'text/css'
  }
  else {
    data = 'not found'
    type = 'text/html'
    status = 404
  }
  response.writeHead(status, {"Content-Type": type})
  response.write(data)
  response.end()


}).listen(3000)
