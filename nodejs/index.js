import fs from 'fs'
import __dirname from './__dirname.js';
import {constants} from 'fs'
// node index.js


let read = fs.createReadStream('7.txt', 'utf8')


    for(let i=1; i<4; i++){
      let write = fs.createWriteStream(i+'.txt')
      read.on('data', function (chunk) {
          write.write(chunk)
      })
    }
