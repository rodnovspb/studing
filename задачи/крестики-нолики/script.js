// window.onload - пишем вместо script defer в html
window.onload = function () {
  let count = 0
  for(let i=0; i<9; i++){
    document.querySelector('.game').innerHTML+="<div class='block'></div>"
  }
  document.querySelector('.game').addEventListener('click', function (event) {
    if(event.target.className=='block'){
      if(count%2==0){
        event.target.innerHTML='x'
      }
      else {
        event.target.innerHTML='0'
      }
      count++

    }
    checkWinner()
  })

  function checkWinner() {
    let allBlock = document.querySelectorAll('.block')

    if(allBlock[0].innerHTML && allBlock[0].innerHTML==allBlock[1].innerHTML && allBlock[1].innerHTML==allBlock[2].innerHTML){alert('WIN!');location.reload()}
    if(allBlock[3].innerHTML && allBlock[3].innerHTML==allBlock[4].innerHTML && allBlock[4].innerHTML==allBlock[5].innerHTML){alert('WIN!');location.reload()}
    if(allBlock[6].innerHTML && allBlock[6].innerHTML==allBlock[7].innerHTML && allBlock[7].innerHTML==allBlock[8].innerHTML){alert('WIN!');location.reload()}
    if(allBlock[0].innerHTML && allBlock[0].innerHTML==allBlock[3].innerHTML && allBlock[3].innerHTML==allBlock[6].innerHTML){alert('WIN!');location.reload()}
    if(allBlock[1].innerHTML && allBlock[1].innerHTML==allBlock[4].innerHTML && allBlock[4].innerHTML==allBlock[7].innerHTML){alert('WIN!');location.reload()}
    if(allBlock[2].innerHTML && allBlock[2].innerHTML==allBlock[5].innerHTML && allBlock[5].innerHTML==allBlock[8].innerHTML){alert('WIN!');location.reload()}
    if(allBlock[0].innerHTML && allBlock[0].innerHTML==allBlock[4].innerHTML && allBlock[4].innerHTML==allBlock[8].innerHTML){alert('WIN!');location.reload()}
    if(allBlock[6].innerHTML && allBlock[6].innerHTML==allBlock[4].innerHTML && allBlock[4].innerHTML==allBlock[2].innerHTML){alert('WIN!');location.reload()}

  }

}

