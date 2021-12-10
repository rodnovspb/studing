import fs from 'fs'
// node index.js


let arr = ['1.txt','2.txt','3.txt','4.txt','5.txt' ]

async function func() {
  try {
    for(let elem of arr){
      await fs.promises.writeFile(elem, Math.random()*10+'')
    }
    let sum=0
    for(let elem of arr){
      let z = await fs.promises.readFile(elem, "utf8")
      sum+=~~z
    }

    await fs.promises.writeFile('6.txt', sum+'')
  }
  catch (e) {
    console.log(e)
  }


}




func()