let http = require('http')
let url = require('url')

let server = new http.Server

server.listen(80, '127.0.0.1')

server.on('request', function (req, res){
	let parsedUrl = url.parse(req.url, true)
	console.log(parsedUrl)
	res.end(parsedUrl.query.q)
})