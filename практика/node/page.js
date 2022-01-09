import http from 'http'

http.createServer(((req, res) => {
  if(req.url=='/'){
    res.write('request main page')
  }
  if(req.url=='/hello'){
    res.write('hello')
  }


res.end()
})).listen(3000)