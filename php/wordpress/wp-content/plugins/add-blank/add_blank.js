;(function add_blank(){
  let links = document.querySelectorAll('a')
  links.forEach(elem=>{
    if(elem.host != 'wordpress'){
      elem.setAttribute('target', '_blank');
    }
  })
})();

