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

