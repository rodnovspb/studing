import http from 'http'
import fs from 'fs'

// node index.js

http.createServer(async (request, response)=>{
  let status = 200
  let layout
 try {
   let mainPath = '.'+request.url + 'layout.html'
   let titlePath = '.'+request.url + 'name/'+'title.html'
   let contentPath = '.'+request.url + 'name/'+'content.html'
   layout = await fs.promises.readFile(mainPath, 'utf8')
   let title = await fs.promises.readFile(titlePath, 'utf8')
   let content = await fs.promises.readFile(contentPath, 'utf8')
   layout = layout.replace(/{% get title %}/,   title);
   layout = layout.replace(/{% get content %}/, content)
 }
 catch (e) {
   status = 404
   layout = await fs.promises.readFile('404.html')
 }
  response.writeHead(status, {'Content-Type': 'text/html'})
  response.write(layout)
  response.end()
}).listen(3000)