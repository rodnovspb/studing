window.onload = function () {
  let timer, scrolled


    document.querySelector('#top').onclick = function () {
      scrolled = pageYOffset
        scroll()
    }

    function scroll() {
      if(scrolled>0){
        scrolled = scrolled-25
        scrollTo(0, scrolled)
        timer = setTimeout(scroll, 10)
      }
      else {
        clearTimeout(timer)
        scrollTo(0, 0)
      }
    }
  }

























