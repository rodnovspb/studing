let str=''
let str2=''
let key
document.querySelector('.test').onkeypress = function (event) {
    str+=event.key
    str2+=String.fromCharCode(getRandomIntInclusive(65,122))
    this.value = str2
  console.log(str2)
  console.log(str)
    return false
}

function getRandomIntInclusive(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min; //Максимум и минимум включаются
}
document.querySelector('.test').addEventListener('keydown', function (event) {
  if(event.key === "Backspace" || event.key  === "Delete"){
    str2 = str2.slice(0,-1)
    str = str.slice(0,-1)
  }
})






