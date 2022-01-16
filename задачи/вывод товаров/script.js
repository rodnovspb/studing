window.onload = function () {
let goodsList = {
  '1234': {
    name: 'Помидоры',
    cost: 30,
    image: './image/tomato.png'
  },
  '1235': {
    name: 'Яблоки',
    cost: 25,
    image: './image/apple.png'
  },
  '1236': {
    name: 'Бананы',
    cost: 40,
    image: './image/banana.png'
  }
}

let goods = document.querySelector('.goods')
for(let elem in goodsList){
  goods.innerHTML += goodsList[elem].name + '<br>'
  goods.innerHTML += goodsList[elem].cost + '<br>'
  goods.innerHTML += '<img src="'+ goodsList[elem].image + '" alt="'+goodsList[elem].name + '">' + '<br><hr>'
}

}