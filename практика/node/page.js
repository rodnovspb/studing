import http from 'http'

http.createServer(((req, res) => {
  res.setHeader("Content-Type", "text/html; charset=utf-8;")
  if(req.url=='/'){
    res.write('request main Привет, мир page')
  }
  if(req.url=='/hello'){
    res.write('hello')
  }


res.end()
})).listen(3000)