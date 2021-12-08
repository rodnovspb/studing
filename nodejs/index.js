import fs from 'fs'
// node index.js

fs.readFile('1.txt', 'utf8', function (e,data1) {
    if(!e){
      fs.readFile('2.txt', 'utf8', function (e, data2) {
          if(!e){
            fs.readFile('3.txt', 'utf8', function (e, data3) {
                if(!e){
                  fs.readFile('4.txt', 'utf8', function (e, data4) {
                      if(!e){
                        fs.readFile('5.txt', 'utf8', function (e, data5) {
                            if(!e){
                              console.log(~~data1+~~data2+~~data3+~~data4+~~data5)
                            }
                            else {
                              console.log('ошибка чтения файла 5')
                            }
                        })
                      }
                      else {
                        console.log('ошибка чтения файла 4')
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



