import fs from 'fs'
import __dirname from './__dirname.js';
import {constants} from 'fs'
import {createGzip} from 'zlib'
import http from 'http'

// node index.js


http.createServer(async (request, response)=>{
  let obj = {
    '/page1': '19.html',
    '/page2': '20.html',
    '/page3': '21.html',
  }

  if (request.url != '/favicon.ico') {
    let text
    let status = 200

    switch (request.url) {
      case '/page1' : text = await fs.promises.readFile(obj['/page1'], 'utf8')
        break
      case '/page2' : text = await fs.promises.readFile(obj['/page2'], 'utf8')
        break
      case '/page3' : text = await fs.promises.readFile(obj['/page3'], 'utf8')
        break
      default : text = 'not found'; status = 404
        break
    }

    response.writeHead(status, {'Content-Type': 'text/html'})
    response.write(text)
    response.end()

  }



}).listen(3000)

