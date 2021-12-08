import fs from 'fs'
// node index.js


fs.readFile('1.txt', 'utf8',  (e, data1) => {
    if(!e){
      fs.readFile('2.txt', 'utf8',  (e, data2) => {
          if(!e){
            fs.readFile('3.txt', 'utf8',  (e, data3) => {
                if(!e){
                  let a = ~~data1+~~data2+~~data3 + '!'
                  fs.writeFile('8.txt', a, e => {
                      if(e){
                        console.log('ошибка записи')
                      }
                  })
                }
                else {
                  console.log('ошибка чтения файла 3')
                }
            })
          }
          else {
            console.log('ошибка чтения файла 2')
          }
      })
    }
    else {
      console.log('ошибка чтения файла 1')
    }
})
