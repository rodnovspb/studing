;(function (){
	let inn_ip = document.querySelector('.auto_inn_ip')
	let inn_org = document.querySelector('.auto_inn_org')

	if((typeof(inn_ip) == 'undefined' || inn_ip == null) && (typeof(inn_org) == 'undefined' || inn_org == null)) {
		return false;
	}

	let name = document.querySelector('.auto_name')
	let city = document.querySelector('.auto_city')
	let flag = true;
	let inn_node, ogrn;


	if(inn_ip){
		inn_node = inn_ip;
		ogrn = 'ОГРНИП'
		inn_ip.addEventListener('input', function (){
			if(this.value.length >= 12){
				let query = this.value.match(/\b(\d{15})\b|\b(\d{12})\b/g);
				if (query && query.length > 0 && flag){
					getData(query[0])
				}
			}
		})
	}

	if(inn_org){
		inn_node = inn_org;
		ogrn = 'ОГРН'
		inn_org.addEventListener('input', function (){
			if(this.value.length >= 10){
				let query = this.value.match(/\b\d{13}\b|\b\d{10}\b/g);
				if (query && query.length > 0 && flag){
					getData(query[0])
				}
			}
		})
	}

function getData(inn){
	fetch('/get_req.php', {
		method: "POST",
		mode: 'cors',
		body: JSON.stringify({query: inn})
	})
	.then(response => response.json())
	.then(result => show(result))
	.catch(error => console.log("error", error));
}

function show(result){
	if(result.suggestions[0]){
		let obj = result.suggestions[0];
		inn_node.value = `ИНН: ${obj.data.inn} ${ogrn}: ${obj.data.ogrn}`;
		name.value = obj.value;
		city.value = `${obj.data.address ? obj.data.address.value : ''}`
		if(city.value.length === 0){
			city.focus();
		} else {
			inn.blur()
		}
	} else {
		flag = false
	}
}

})()






