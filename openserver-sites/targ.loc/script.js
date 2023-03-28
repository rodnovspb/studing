let form = document.querySelector('form');

form.addEventListener('submit', function() {
	let hidd = document.createElement('input');
	hidd.type = 'hidden';
	hidd.name = 'xxx';
	hidd.value = '+++';

	form.append(hidd);
});