<?php
require_once '../show.php';

use DiDom\Document;




$cities = json_decode(file_get_contents('cities.json'), true);

$bel = $cities['BY'];

?>

<select name="city">
    <?php foreach ($bel as $city): ?>
        <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
    <?php endforeach; ?>
</select>

<table>
</table>

<script>
    let select = document.querySelector('select')
	select.addEventListener('change', function (e) {
        let id = select.value
        fetch(`https://pogoda.by/api/v2/numeric-weather/6/${id}/3`)
        .then(res=>res.json())
        .then(res=>showWeather(res))
        .catch(e=>console.log(e))
	  })
    
    
    function showWeather(data){
    	console.log(data)
		let table = document.querySelector('table')
		let html = `<tr>
				        <th>Температура</th>
		                <th>Погодные являения</th>
		                <th>Давление</th>
		                <th>Осадки</th>
	                </tr>`
    	let obj = data[Object.keys(data)[0]]
    	for (let item in obj){
    		let subObj = obj[item]
			html += `
                <tr>
                    <td>${subObj['TMP']}</td>
                    <td>${subObj['TypeWeather']}</td>
                    <td>${subObj['PRESSURE_MAX']}</td>
                    <td>${subObj['PRECIP']}</td>
                </tr>`
        }

		table.innerHTML = null;
		table.insertAdjacentHTML('beforeend', html)
    }
    
    
   
</script>





