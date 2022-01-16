let str = "АБВГДЕЁЖЗИЙКЛМНОПРСУФХЦЧШЩЪЫЬЭЮЯабвгдеёжзийклмнопрстуфхцчшщъыьэюя"
let alfa = [...str]
let beta = shuffle([...str])

function shuffle(array) {
  for(let i = array.length-1; i>0; i--){
    let j = Math.floor(Math.random()*(i+1))
    let t = array[i]
    array[i] = array[j]
    array[j] = t
  }
  return array
}

let obj = {}


for(let i=0; i<alfa.length; i++){
  obj[alfa[i]] = beta[i]
}
let out = document.querySelector('.out')
let input = document.querySelector('.input')
document.querySelector('.btn').onclick = ()=> {
  let value = input.value
  let str = ''
  let valueInArray = value.split('')
  for(let elem of valueInArray){
    if(obj[elem]) str+=obj[elem]
    else str+=elem
  }

out.textContent = str
}


let[,,a,b,c, ...z] = [1,2,3,4,5]
 console.log(z)











