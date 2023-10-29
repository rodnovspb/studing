let fs = require('fs')

fs.writeFile('test.txt','1111', function (err){
	if (err) {
		console.log('ошибка');
	}
})

fs.readFile('test.txt', 'utf8', function (e,d){
	console.log(d)
})

console.log(22)