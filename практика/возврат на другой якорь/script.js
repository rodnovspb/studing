
function random(min, max) {
  let num = min + Math.random()*(max+1-min)
  return Math.floor(num)
}

function scrollPage(){
  let rand = random(1, 8)
  let section = document.querySelector('.elem' + rand)
  section.scrollIntoView({behavior: "smooth"})
}

if(localStorage.getItem('scroll')){
  scrollPage()
}

localStorage.setItem('scroll', '1')

window.addEventListener('pageshow', function (e) {
  if (e.persisted) {
    scrollPage();
    console.log(e)
  }
}, false);

let w = 1
let btn = document.querySelector('.elem')
btn.addEventListener('click', function (e) {
  if(w) {
    console.log(e)
  }

}, false)

window.addEventListener('beforeunload', function () {
  localStorage.setItem('a', '11111111111111')
  localStorage.setItem('b', '222222222222222')
})







// if(localStorage.getItem('timestamp')){
//   let timestamp1 = new Date().getTime()
//   let minute = (timestamp1 - localStorage.getItem('timestamp'))/1000
//   if(minute<5){
//     scrollPage()
//   }
//   else {
//     localStorage.setItem('timestamp', timestamp1)
//   }
// }
// else {
//   let timestamp = new Date().getTime()
//   localStorage.setItem('timestamp', timestamp)
// }





