function Car(carName){
	this.carName = carName || 'Unknown name'
}

Car.prototype.logName = function (){
	console.log('Имя: ', this.carName)
}

export default {
	Car: Car
}