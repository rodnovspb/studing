

document.querySelector('select').addEventListener('change', function () {
		let city = this.value
		let id = "&appid=8aa018d83a80cbb17efbe36a3c7400fc"
		let site = "https://api.openweathermap.org/data/2.5/weather?q="
		let path = site + city + id
	fetch(path).then(resp => resp.json()).then(data => console.log(data))

		})







