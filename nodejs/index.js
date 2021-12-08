import fs from 'fs'
// node index.js


fs.readFile('readme1.txt', 'utf8', (err, data1) => {
  if (!err) {
    fs.readFile('readme2.txt', 'utf8', (err, data2) => {
      if (!err) {
        fs.writeFile('readme.txt', data1 + data2, err => {
          if (err) {
            console.log('ошибка записи файла');
          }
        });
      } else {
        console.log('ошибка чтения файла readme2');
      }
    });
  } else {
    console.log('ошибка чтения файла readme1');
  }
});
