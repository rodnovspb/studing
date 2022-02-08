
let div = document.querySelector('div')


document.querySelector('select').addEventListener('input', function () {
		div.innerHTML = null
		let city = this.value
		let id = "&appid=8aa018d83a80cbb17efbe36a3c7400fc"
		let site = "https://api.openweathermap.org/data/2.5/weather?q="
		let path = site + city + id
		fetch(path).then(resp => resp.json()).then(data => {
			console.log(data)
		let t = (data.main.temp - 273.15).toFixed(2)
		div.innerHTML = t + " градусов"

	})

		})







