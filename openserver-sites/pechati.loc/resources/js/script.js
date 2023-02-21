document.addEventListener("DOMContentLoaded", ()=>{
  fetchGetIp();
  attachFiles();

});



function  fetchGetIp(){
  let inputInn = document.querySelector('#inn');
  let inputName = document.querySelector('#input_name');
  if ((typeof (inputInn) != 'undefined' && inputInn != null) && (typeof (inputName) != 'undefined' && inputName != null)) {
    inputInn.addEventListener('input', function (e) {
      if (inputInn.value.length >= 12) {
        // ищем числа состоящие из 12 или 15 цифр
        let number = inputInn.value.match(/\b\d{15}\b|\b\d{12}\b/g);
        if (number && number.length > 0) {
          fetch('/dadata/ip', {
            headers: {
              'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value,
              'Content-Type': 'application/json',
              'Accept': 'application/json',
            },
            method: "POST",
            body: JSON.stringify({inn: number[0]})
          })
            .then(response => response.json())
            .then(result => {
              if (result.suggestions[0]) {
                inputName.value = result.suggestions[0].value;
              }
            })
            .catch(error => console.log("error", error));
        }
      }
    });
  }
}

function attachFiles(){


  attachButton.addEventListener('click', function (e){
    fileList.insertAdjacentHTML('beforeend', `<li class="file__item"><input type="file" name="files[]"><button type="button">╳</button></li>`);






  })





      // if(this.files.length === 0) { return false; }
      // if(this.files[0].size > 10485760) { alert('Файл не больше 10 Мб, пожалуйста'); return false; }



}


