document.onmousemove = function (){
  document.querySelector('body').insertAdjacentHTML('beforeend', '<img class="eve" src='+"https://i.mycdn.me/i?r=AzEPZsRbOZEKgBhR0XGMT1RkRRFa6qBDBm9jSVFCoVz4bKaKTM5SRkZCeTgDn6uOyic"+ ' alt="елка">')
  let eve = document.querySelector('.eve')
  eve.style.position = 'fixed'
  eve.style.zIndex = '10'
  document.onmousemove = function (event) {
    eve.style.left = event.clientX +20+ 'px'
    eve.style.top = event.clientY +20+ 'px'
  }
}


