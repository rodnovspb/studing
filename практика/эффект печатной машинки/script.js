
const arr = [
		"Привет, мир\n",
		"Это вывод текста\n"
]

function func() {
	let line = 0
	let count = 0
	let text = ''
	let out = document.querySelector('.out')

	function getRandomTime(max) {
		//нужно время от min до max миллисекунд
		return Math.random()*max

	}


	function type(){
	let timer = setTimeout(function time() {
		text+=	arr[line][count]
		out.innerHTML = text + "|"
		count++
		if(count>=arr[line].length){
			count=0;
			line++
		}
		if(line>=arr.length){

			out.innerHTML = text // убираем вертикальную черту
			count=0
			line=0
			clearTimeout(timer)
			return
		}
		type()
	}, getRandomTime(getRandomTime(350*2)))
	}

	type()


}

func()