import http from 'http'
import fs from 'fs'

// node index.js

http.createServer(async (request, response)=>{
  let status = 200
  let layout
  console.log(request.url)
 try {
    if(!/css|js|img/.test(request.url)){
      let mainPath = 'layout.html'
      let titlePath = './name/'+'title.html'
      let contentPath = './name/content.html'
      let metaPath = '.'+request.url + 'meta.html'
      layout = await fs.promises.readFile(mainPath, 'utf8')
      let meta = await fs.promises.readFile(metaPath, 'utf-8')
      let title = await fs.promises.readFile(titlePath, 'utf8')
      let content = await fs.promises.readFile(contentPath, 'utf8')
      layout = layout.replace(/{% get title %}/,   title);
      layout = layout.replace(/{% get content %}/, content)
      layout = layout.replace(/{% get meta %}/, meta)
      response.writeHead(status, {'Content-Type': 'text/html'})
      console.log('1 иф')
    }
    else if(/css|js|img/.test(request.url)){
      layout = await fs.promises.readFile('.'+request.url)
      console.log('2 иф')
      if(/css/.test(request.url)){
        response.writeHead(status, {'Content-Type': 'text/css'})
        console.log('3 иф css')
      }
    else if(/js/.test(request.url)){
        response.writeHead(status, {'Content-Type': 'text/javascript'})
        console.log('4 иф js')
      }
    else if(/img/.test(request.url)){
        response.writeHead(status, {'Content-Type': 'image/jpeg'})
        console.log('5 иф img')
      }

    }
 }
 catch (e) {
   status = 404
   layout = await fs.promises.readFile('404/404.php')
   response.writeHead(status, {'Content-Type': 'text/html'})
   console.log('6 иф/ошибка')
 }

  response.write(layout)
  console.log('7 иф итог')
  response.end()
}).listen(3000)