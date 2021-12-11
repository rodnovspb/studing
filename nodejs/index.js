import fs from 'fs'
import __dirname from './__dirname.js';
import {constants} from 'fs'
import {createGzip} from 'zlib'
import http from 'http'

// node index.js

http.createServer(async (request, response) => {
  if (request.url != '/favicon.ico') {
    let path = 'root' + request.url;



      path += 'index.html';

    let text = await fs.promises.readFile(path, 'utf8');

    response.writeHead(200, {'Content-Type': 'text/html'});
    response.write(text);
    response.end();
  }
}).listen(3000);
