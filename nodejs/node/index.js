let optimist = require('optimist')

let message = optimist.argv.message

console.log('Привет, ' + message)