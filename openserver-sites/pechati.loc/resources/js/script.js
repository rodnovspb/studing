
document.addEventListener('DOMContentLoaded', function() {


    let elem = document.querySelector('#inn')

    elem.addEventListener('click', function (e) {

        fetch('/dadata', {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            method: "POST",
            body: '1',
        })
            .then(response => response.json())
            .then(result => console.log(result))
            .catch(error => console.log("error", error));
      })



}, false);





