let http = require('http')

let server = new http.Server

server.listen(80, '127.0.0.1')

let counter = 0

server.on('request', function (req, res){
	res.end('counter: ' + counter++)
})