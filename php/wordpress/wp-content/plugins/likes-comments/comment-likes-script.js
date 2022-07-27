let comments = document.querySelectorAll('.comment p:first-of-type')

comments.forEach(elem=>{
  elem.classList.add('comment_p')
  let like = document.createElement('span')
  like.className = 'like-comment'
  let comment_id = (elem.closest('div').id).split('-')[1]
  like.dataset.number = comment_id
  like.innerHTML = `<span class="like-comment__icon"></span><span class="like-comment__counter">0</span>`
  elem.append(like)
})

document.addEventListener('mousedown', function (e){
  if(!e.target.matches('.like-comment__icon')) return
  e.target.style.transform = 'scale(1.2)'
})

document.addEventListener('mouseup', function (e){
  if(!e.target.matches('.like-comment__icon')) return
  e.target.style.transform = null
})

let icons = document.querySelectorAll('.like-comment__icon')

icons.forEach(elem=>{
  //приходится так перебирать, а не делегировать родителю, так как нужно будет отвязывать после первого клика
  elem.addEventListener('click', function (e){
    this.nextElementSibling.textContent++
    let comment_id = this.closest('span.like-comment').dataset.number
    incrementDBCommentCounter(comment_id);
  }, {once: true})
})

let spanComments = document.querySelectorAll('span[data-number]')
// проверяем есть ли комментарии на странице и запускаем запрос в базу если есть
if(spanComments.length > 0){
  let commentsIdArr = []
  for (let comment of spanComments) {
    commentsIdArr.push(+comment.dataset.number)
  }

//запрашиваем количество лайков из базы
  (async ()=>{
    try {
      let formdata = new FormData;
      formdata.append('ids', commentsIdArr)
      let response = await fetch(`wp-content/plugins/likes-comments/ajax.php`, {
        method: "POST",
        body: formdata
      })
      if(response.ok){
        let data = await response.json()
        setCommentLikes(data)
      }
    } catch (e){console.log(e)}
  })()

  function setCommentLikes(data){
    data.forEach(elem=>{
      let id = elem['comment_id'];
      document.querySelector("span[data-number='" + id + "'] .like-comment__counter").textContent = elem['count_likes']
    })
  }
}



function incrementDBCommentCounter(id){
  fetch(`wp-content/plugins/likes-comments/ajax.php?count=increment&id=${id}`)
  .catch(e=>console.log(e))
}
