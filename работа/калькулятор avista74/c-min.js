!function(){let e=document.querySelector(".calc");if(void 0===e||null==e)return!1;let t=document.querySelector(".patent"),c=document.querySelector(".patent__block"),l=document.querySelector(".common__block");function o(e,t,c){let l=document.querySelector(".calc__staff .calc__block:not(.dn) .calc__item.active").dataset.val,o=Math.round(r[e][t-1][1]*Number(l));5!=e&&6!=e||(o+=5e3),o=o.toLocaleString(),document.querySelector(".result__price").textContent=o+=" ₽"}e.addEventListener("click",function(r){let u=r.target;if(u.classList.contains("calc__item")){if(a(u.closest(".calc__block").children),u.classList.add("active"),u.closest(".calc__system")&&(document.querySelector(".result__price").textContent="0 ₽",u===t?(a(l.querySelectorAll(".calc__item")),c.classList.remove("dn"),l.classList.add("dn")):(a(c.querySelectorAll(".calc__item")),l.classList.remove("dn"),c.classList.add("dn"))),e.querySelectorAll(".calc__item.active").length>=3){o(n(document.querySelector(".calc__system .calc__block")),n(document.querySelector(".calc__operations .calc__block")),n(document.querySelector(".calc__staff .calc__block:not(.dn)")))}}});

	let r={
		'1': 	[['20',3000],['20-50',10000],['50-100',16000],['100-150',20500],['150-200',25000],['200',40000]],
		'2': 	[['20',5000],['20-50',7500], ['50-100',12500],['100-150',16500],['150-200',20000],['200',30000]],
		'3':	[['20',5000],['20-50',8000], ['50-100',13500],['100-150',18000],['150-200',22000],['200',33000]],
		'4': 	[['20',5000],['20-50',5000], ['50-100',5000], ['100-150',5000], ['150-200',5000], ['200',5000]],
		'5': 	[['20',5000],['20-50',7500], ['50-100',12500],['100-150',16500],['150-200',20000],['200',30000]],
		'6':    [['20',5000],['20-50',8000], ['50-100',13500],['100-150',18000],['150-200',22000],['200',33000]]
	};


	function n(e){return String(Array.from(e.children).indexOf(e.querySelector(".calc__item.active"))+1)}function a(e){for(let t of e)t.classList.remove("active")}document.querySelector(".calc").addEventListener("submit",function(){let e=document.querySelectorAll(".calc__item.active"),t="";for(let c of e)t+=" / "+c.textContent;document.querySelector(".result__price").value+=t}),o(1,1)}();