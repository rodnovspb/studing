let post = document.querySelector('.post')
let like = document.createElement('div')
like.className = 'like'
like.innerHTML = `<div class="like__icon"></div><div class="like__counter"></div>`
post.after(like)

let icon = like.querySelector('.like__icon')
let counter = document.querySelector('.like__counter')
counter.textContent = 0;
let link = new URL(document.location.href)
let id = link.searchParams.get('p')


icon.addEventListener('mousedown', function (e){
    this.style.transform = `scale(1.2)`
})
icon.addEventListener('mouseup', function (e){
  this.style.transform = ``
})
icon.addEventListener('click', function incrementCounter(e){
  counter.textContent++
  incrementDBCounter();
  icon.removeEventListener('click', incrementCounter)
})


fetch(`wp-content/plugins/likes/ajax.php?count=how_much&id=${id}`)
.then(res=>res.text())
.then(res=>setCount(res))
.catch(e=>console.log(e))

function setCount(num){
  counter.textContent = num;
}

function incrementDBCounter(){
  fetch(`wp-content/plugins/likes/ajax.php?count=increment&id=${id}`)
  .then(res=>res.text())
  .catch(e=>console.log(e))
}