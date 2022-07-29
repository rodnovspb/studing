;(function (){
  let elem = document.querySelector('div#contact-form')
  let btn = document.createElement('button')
  btn.className = 'contact-form-btn'
  btn.textContent = 'Форма связи'
  elem.append(btn)
  document.body.insertAdjacentHTML('beforeend', `
    <div class="contact_form-plugin-wrapper">
<form class="contact_form-plugin" action="../../wp-admin/admin-post.php">
  <span class="contact_form-plugin-close">&#128473;</span>
  <div class="name"><label>Ваше имя <input type="text" name="name" pattern="[A-Za-zА-ЯЁа-яё]{1,30}"></label></div>
  <div class="tel"><label>Ваш телефон <input type="tel" name="tel"></label></div>
  <div class="submit"><input type="hidden" name="action" value="contact_form-plugin"><input type="submit"></div>
</form>
</div><div class="overlay"></div>
  `)

  btn.addEventListener('click', function (e){
    let overlay = document.querySelector('.overlay')
    document.body.classList.add('open-modal')
  })

  //это вариант без перехода на другую страницу
  // let form = document.querySelector('.contact_form-plugin')
  // form.addEventListener('submit', function (e){
  //   e.preventDefault()
  //   fetch('../../wp-admin/admin-post.php', {
  //     method: "POST",
  //     body: new FormData(this)
  //   }).catch(e=>{console.log(e)}).finally(()=>{
  //     document.body.classList.remove('open-modal')
  //   })
  // })


})();

window.addEventListener('click', (e)=>{
 if(e.target.matches('.contact_form-plugin-close')){
   document.body.classList.remove('open-modal')
 }
})