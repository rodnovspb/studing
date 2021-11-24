let btn1 = document.querySelector('.elem1')
let div = document.querySelector('div')
let i = 0

      btn1.addEventListener('click', function func() {
         if(i==0){
               fetch('ajax1.html').then(response=>{return response.text()}).then(text=>{div.innerHTML+=text})
               i++
               btn1.removeEventListener('click', func)
         }
         }
      )


      btn1.addEventListener('click', function func() {
              if(i==1){
                    fetch('ajax2.html').then(response=>{return response.text()}).then(text=>{div.innerHTML+=text})
                    i++
                    btn1.removeEventListener('click', func)
              }
        }
      )















