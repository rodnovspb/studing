

let div = document.querySelector('.main')
window.addEventListener('scroll', add)
let timer = null

function add(){
  if(!timer){
    timer = setTimeout(function (){
      let window = document.documentElement.clientHeight
      if(window+200 > document.documentElement.getBoundingClientRect().bottom){
        f()
      }
      timer = null
    }, 250)

  }
}



function f(){

  fetch('ajax.php')
  .then(res=>res.json())
  .then(res=>{
    div.insertAdjacentHTML('beforeend', res)
  })

}