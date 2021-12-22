import fs from 'fs'
import __dirname from './__dirname.js';
import {constants} from 'fs'
import {createGzip} from 'zlib'
import http from 'http'


// node index.js

function getMimeType(path) {
  let mimes = {
    html: 'text/html',
    jpeg: 'image/jpeg',
    jpg:  'image/jpeg',
    png:  'image/png',
    svg:  'image/svg+xml',
    json: 'application/json',
    js:   'text/javascript',
    css:  'text/css',
    ico:  'image/x-icon',
  };

  let exts = Object.keys(mimes);
  let extReg = new RegExp('\\.(' + exts.join('|') + ')$');


  let ext = path.match(extReg)[1];

  if (ext) {
    return mimes[ext];
  } else {
    return 'text/plain';
  }
}

http.createServer(async (request, response)=>{
  let status = 200
  let data

  let path = 'root' + request.url
  if(!/html/.test(path) &&
  !/css/.test(path) &&
  !/img/.test(path) &&
  !/js/.test(path)
  ){
    path = 'root' + request.url + '.html'
  }



  try {
    data = await fs.promises.readFile(path)

  }
  catch (e) {
    status = 404
    path = 'root/404.html'
    data = await fs.promises.readFile(path)
  }
  console.log(path)
  response.writeHead(status, {'Content-Type': getMimeType(path)})
  response.write(data)
  response.end()



}).listen(3000)