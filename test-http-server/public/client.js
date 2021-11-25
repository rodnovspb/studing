let btn1 = document.querySelector('.elem1')
let div = document.querySelector('div')
let i = 0

      btn1.addEventListener('click', function func() {

         if(i==0){
               fetch('ajax1.html').then(response=>{return response.text()}).then(text=>{div.innerHTML+=text})

         }
      if(i==1){
      fetch('ajax2.html').then(response=>{return response.text()}).then(text=>{div.innerHTML+=text})
      }

      if(i==2){
      fetch('ajax3.html').then(response=>{return response.text()}).then(text=>{div.innerHTML+=text})
      }
i++
      if(i==3){
      i=0
      }
      }
      )


















