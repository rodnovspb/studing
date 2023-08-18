;(function smooth(){
    let items = document.querySelectorAll('.smooth')
    if(items && items.length > 0){
        if(!!window.IntersectionObserver){
            let observer = new IntersectionObserver(((entries, observer) => {
                entries.forEach(entry => {
                    if(entry.isIntersecting){
                        entry.target.classList.remove('dn')
                        observer.unobserve(entry.target)
                    }
                })
            }))
            items.forEach(item => {
                item.classList.add('dn')
                observer.observe(item)
            })
    }
    }
})();

;(function (){
    let questions = document.querySelectorAll('.questions__item')
    if(questions && questions.length > 0){
        questions.forEach(item => {
            item.addEventListener('click', function (e){
                item.classList.toggle('active')
            })
        })
    }



})();

