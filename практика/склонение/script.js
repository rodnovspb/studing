const word = 'сертификат';
const out = document.querySelector('.out')
// else if
document.querySelector('.range').addEventListener('input', function () {
		let value = +this.value
		let n = value%10
	if(value===0){
			out.textContent = ''
			return
		}
	if(n===1 && value !==11){
		out.textContent = `Получен ${value} сертификат`
		return
	}
	if(n>=2 && n<=4 && value !==12 && value !==13 && value !==14){
		out.textContent = `Получено ${value} ${word}a`
		return
	}
	if(n>=5 && n<=9 || n===0 || value ===11 || value ===12 || value === 13 || value === 14){
			out.textContent = `Получено ${value} ${word}ов`
			return
	}

})


function f() {
	let a = 5
	if(a>1){
		console.log("первый иф")
		return
	}
	if(a<10){
		console.log("второй иф")
	}
}
f()