let http = require('http')
let url = require('url')
let fs = require('fs')

let server = new http.Server

server.listen(80, '127.0.0.1')

server.on('request', function (req, res){
	let parsedUrl = url.parse(req.url, true)
	fs.readFile(getPageNameByPath(parsedUrl.pathname) + '.html', function (err, data){
		if(err) throw new Error(err);
		res.end(data)
	})
})

function getPageNameByPath(path){
	switch (path){
		case '/':
			return 'index';
		case '/about':
			return 'about';
		default:
			return '404';


	}
}