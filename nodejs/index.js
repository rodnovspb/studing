import fs from 'fs'
// node index.js

for(let i=1; i<=10; i++){

  fs.writeFile(String(i)+".txt", (i).toString(), function (e) {
      if(e){
        console.log('ошибка', e)
      }
  })
}




