let str = '';
const ref = 'hello';
let str2 = '1074|1074|1077|1076|1077|1085|1086|32|1082|1086|1076|1086|1074|1086|1077|32|1089|1083|1086|1074|1086';

document.addEventListener('keypress', function (event) {
	str+=event.key;
	if(ref.indexOf(str)!==0){
		str=''
	}
	else if(str==ref) {
		console.log(f(str2))
	}
})


function f(text) {
	return text.split('|').map(elem=>String.fromCharCode(elem)).join('')

}

