let model = {
	number: 0,
	calc: function (x,y) {
		this.number=x*y
		view.showNumber(this.number)
	}

}

let view = {
	showNumber: function(n){
		document.querySelector('p').innerHTML = n;
}
}



let controller = {
	handle: function () {
		model.calc(1000,1000)
	}
}


// swerwer

;(function () {
		let app = {
			init: function() {
				this.main()
				this.event()
			},
			main: function () {

			},
			event: function () {
				let input = document.querySelector('input')
				input.onclick = controller.handle
			},
		}

	app.init()

})()

let elems = document.querySelectorAll('')

























