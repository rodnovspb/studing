document.addEventListener('DOMContentLoaded', function (e) {
	country.addEventListener('change', function (e) {
	      let countryVal = parseInt(country.value)
		  selectRegion(countryVal);
	  })
	region.addEventListener('change', function (e) {
		let regionVal = parseInt(region.value)
		selectCity(regionVal);
	  })
  })

function selectRegion(country){
	clear(region)
	divregion.style.display = 'none'
	clear(city)
	divcity.style.display = 'none'
	if(country > 0){
		divregion.style.display = 'block'
		region.disabled = false
		fetch(`index.php?country=${country}`)
				.then(res=>res.json())
				.then(res=>fillRegion(res))
				.catch(e=>console.log(e))
	}
}

function selectCity(regionVal){
	clear(city)
	divcity.style.display = 'none'
	if(regionVal > 0){
		divcity.style.display = 'block'
		city.disabled = false
		fetch(`index.php?region=${regionVal}`)
				.then(res=>res.json())
				.then(res=>fillCity(res))
				.catch(e=>console.log(e))
	}
}

function fillRegion(data){
	let text = '<option value="0">Выберите регион</option>'
	for (let elem of data) {
		text += `<option value="${elem['id_region']}">${elem['region_name_ru']}</option>`
	}
	region.innerHTML = text
}

function fillCity(data){
	let text = '<option value="0">Выберите город</option>'
	for (let elem of data) {
		text += `<option value="${elem['id_city']}">${elem['city_name_ru']}</option>`
	}
	city.innerHTML = text
}


function clear(val){
	val.innerHTML=null
	val.disabled = true
}



















































