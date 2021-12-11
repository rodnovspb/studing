import fs from 'fs'
import __dirname from './__dirname.js';
import {constants} from 'fs'
import {createGzip} from 'zlib'
import http from 'http'

// node index.js


http.createServer(async (request, response)=> {
  let text
  let status = 200

  switch (request.url) {
    case "/page" :
      text = await fs.promises.readFile("page.html", "utf8")
      break
    default :
      text = 'not found';
      status = 404
      break
  }
  response.writeHead(status, {"Content-Type": "text/html"})
  response.write(text)
  response.end()

}).listen(3000)

