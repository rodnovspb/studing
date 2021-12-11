import fs from 'fs'
import __dirname from './__dirname.js';
import {constants} from 'fs'
import {createGzip} from 'zlib'
import http from 'http'

// node index.js

http.createServer(async (request, response)=>{




    let path = './root'+request.url
      if(/css/.test(path)){
        path = './root'+"/dir"+request.url
        let text = await fs.promises.readFile(path)
        response.writeHead(200, {"Content-Type": 'text/css'})
        response.write(text)
        response.end()
      }
      else if(/js/.test(path)){
        path = './root'+"/dir"+request.url
        let text = await fs.promises.readFile(path)
        response.writeHead(200, {"Content-Type": 'text/javascript'})
        response.write(text)
        response.end()
      }
      else if(/png/.test(path)){
        path = './root'+"/dir"+request.url
        let text = await fs.promises.readFile(path)
        response.writeHead(200, {"Content-Type": 'image/png'})
        response.write(text)
        response.end()
      }
      else if(/dir/.test(path)){
       path += '/index.html';
        let text = await fs.promises.readFile(path)
        response.writeHead(200, {"Content-Type": 'text/html'})
        response.write(text)
        response.end()
      }
      else {
        let text = 'не найдена'
        response.writeHead(404, {"Content-Type": 'text/html'})
        response.write(text)
        response.end()
      }












}).listen(3000)
