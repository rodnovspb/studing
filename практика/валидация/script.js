document.querySelector('.elem1').addEventListener('click', function () {
  let pass = document.querySelector('.elem').value
  pass = pass.trim()
  console.log(validate(pass))
})