let obj=5;
fetch('https://mdn.github.io/learning-area/javascript/oojs/json/superheroes.json').then((res)=>res.json()).then(data=>setHeroes(data))

function setHeroes({squadName, homeTown,  formed, members}) {
	document.body.insertAdjacentHTML('afterbegin', `
	<h1>${squadName}</h1>
	<h2>Hometown: ${homeTown} // Formed: ${formed}</h2>
	<div class="heroes">${setMembers(members)}</div>
	`)
}
function setMembers(members) {
	return members.map(function (elem) {
		return `<div>
		<h3>${elem["name"]}</h3>
		<p>Age: ${elem["age"]}</p>
		<p>SecretIdentity: ${elem["secretIdentity"]}</p>
		<p>Superpowers: </p>
		<ul>
			${elem["powers"].map(power=>`<li>${power}</li>`).join(' ')}
		</ul></div>`
	}).join(' ')
}


