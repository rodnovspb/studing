// document.querySelector('#r1').addEventListener('input', cssGen)
document.querySelector('#r1').oninput = cssGen
function cssGen() {
    let div = document.querySelector('.test')
    let out = document.querySelector('.out')
    out.innerHTML = "webkit-border-radius:" + this.value + 'px;\n'
    out.innerHTML += "border-radius:" + this.value + 'px;'
    div.style.borderRadius = this.value +'px'
}