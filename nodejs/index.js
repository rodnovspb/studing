import fs from 'fs'
import __dirname from './__dirname.js';
import {constants} from 'fs'
import {createGzip} from 'zlib'
import http from 'http'

// node index.js

http.createServer(async (request, response)=>{

  let path = 'root'+request.url + '/index.html'
  let status
  let data

  try {
    data = await fs.promises.readFile(path, 'utf8')
    status=200
  }
  catch (e) {
    status=404
    path='root/dir/404.html'
    data = await fs.promises.readFile(path, 'utf8')
  }
  response.writeHead(status, {'Content-Type': 'text/html'})
  response.write(data)
  response.end()
}).listen(3000)