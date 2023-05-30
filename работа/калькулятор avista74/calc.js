;(function (){
	let calc = document.querySelector('.calc')
	if(typeof(calc) == 'undefined' || calc == null){
		return false;
	}

	let patentBtn = document.querySelector('.patent');
	let patentBlock = document.querySelector('.patent__block');
	let commonBlock = document.querySelector('.common__block');

	calc.addEventListener('click', function (e){
		let target = e.target;
		if(target.classList.contains('calc__item')){
			let children = target.closest('.calc__block').children
			removeActive(children)
			target.classList.add('active')

			if(target.closest('.calc__system')){
				document.querySelector('.result__price').textContent = '0 ₽'
				if(target === patentBtn){
					removeActive(commonBlock.querySelectorAll('.calc__item'))
					patentBlock.classList.remove('dn')
					commonBlock.classList.add('dn')
				} else {
					removeActive(patentBlock.querySelectorAll('.calc__item'))
					commonBlock.classList.remove('dn')
					patentBlock.classList.add('dn')
				}

			}

			if(calc.querySelectorAll('.calc__item.active').length >= 3){
				let indexSystem = getActiveNum(document.querySelector('.calc__system .calc__block'))
				let indexOperations = getActiveNum(document.querySelector('.calc__operations .calc__block'))
				let indexStaff = getActiveNum(document.querySelector('.calc__staff .calc__block:not(.dn)'))
				showSum(indexSystem, indexOperations, indexStaff);

			}
		}
	})

	function showSum(indexSystem, indexOperations, indexStaff){
		let staffСoef = document.querySelector('.calc__staff .calc__block:not(.dn) .calc__item.active').dataset.val;
		let sum = Math.round(tariff[indexSystem][indexOperations - 1][1] * Number(staffСoef))
		if(indexSystem == 5 || indexSystem == 6) {
			sum += 5000
		}
		sum = sum.toLocaleString();
		document.querySelector('.result__price').textContent = sum += ' ₽'
	}

	let tariff = {
		'1': 	[['20',7500],['20-50',10000],['50-100',16000],['100-150',20500],['150-200',25000],['200',40000]],
		'2': 	[['20',5000],['20-50',7500], ['50-100',12500],['100-150',16500],['150-200',20000],['200',30000]],
		'3':	[['20',5000],['20-50',8000], ['50-100',13500],['100-150',18000],['150-200',22000],['200',33000]],
		'4': 	[['20',5000],['20-50',5000], ['50-100',5000], ['100-150',5000], ['150-200',5000], ['200',5000]],
		'5': 	[['20',5000],['20-50',7500], ['50-100',12500],['100-150',16500],['150-200',20000],['200',30000]],
		'6':    [['20',5000],['20-50',8000], ['50-100',13500],['100-150',18000],['150-200',22000],['200',33000]]
	};


	function getActiveNum(list){
		return String(Array.from(list.children).indexOf(list.querySelector('.calc__item.active')) + 1);
	}

	function removeActive(nodeList){
		for(let elem of nodeList){
			elem.classList.remove('active')
		}
	}

	document.querySelector('.calc').addEventListener('submit', function (){
		let activeELems = document.querySelectorAll('.calc__item.active');
		let str = '';
		for(let elem of activeELems){
			str += ' / ' + elem.textContent;
		}
		document.querySelector('.result__price').value += str;
	})

	document.querySelector('.first').click();

})()




