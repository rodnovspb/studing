import fs from 'fs'
// node index.js


async function f() {
  try {
    let a = await fs.promises.readFile('1.txt', 'utf8')
    let b = await fs.promises.readFile('2.txt', 'utf8')
    let c = await fs.promises.readFile('3.txt', 'utf8')
    console.log(a+b+c)
  }
  catch (e) {
    console.log('error')
  }

}
f()