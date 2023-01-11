let deleteBtns = document.querySelectorAll('.btn-delete')




deleteBtns.forEach(elem=>{
    elem.addEventListener('click', function (e){
        if(!confirm('Действительно удалить?')){
            return false
        }
        e.preventDefault()
        let num = this.dataset.delete
            fetch(`bills/${num}`, {
            headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content}})
                .then(res=>{return res.json()})
                .then(res=>{deleteRow(res, elem)})
                .catch(e=>console.log(e))
    })
})

function deleteRow(res, elem){
    if(res===1){
        elem.closest('tr').remove()
    } else {
        alert('Ошибка удаления из базы')
    }
}

