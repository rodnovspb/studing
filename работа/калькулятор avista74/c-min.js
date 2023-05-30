!function(){let $=document.querySelector(".calc");if(void 0===$||null==$)return!1;let e=document.querySelector(".patent"),t=document.querySelector(".patent__block"),c=document.querySelector(".common__block");$.addEventListener("click",function(a){let n=a.target;if(n.classList.contains("calc__item")&&(o(n.closest(".calc__block").children),n.classList.add("active"),n.closest(".calc__system")&&(document.querySelector(".result__price").textContent="0 ₽",n===e?(o(c.querySelectorAll(".calc__item")),t.classList.remove("dn"),c.classList.add("dn")):(o(t.querySelectorAll(".calc__item")),c.classList.remove("dn"),t.classList.add("dn"))),$.querySelectorAll(".calc__item.active").length>=3)){var i,s,_;let u=r(document.querySelector(".calc__system .calc__block")),d=r(document.querySelector(".calc__operations .calc__block")),y=r(document.querySelector(".calc__staff .calc__block:not(.dn)")),S,f;i=u,s=d,_=y,S=document.querySelector(".calc__staff .calc__block:not(.dn) .calc__item.active").dataset.val,f=Math.round(l[i][s-1][1]*Number(S)),(5==i||6==i)&&(f+=5000),f=f.toLocaleString(),document.querySelector(".result__price").textContent=f+=" ₽"}});

	let l = {
		'1': 	[['20',7500],['20-50',10000],['50-100',16000],['100-150',20500],['150-200',25000],['200',40000]],
		'2': 	[['20',5000],['20-50',7500], ['50-100',12500],['100-150',16500],['150-200',20000],['200',30000]],
		'3':	[['20',5000],['20-50',8000], ['50-100',13500],['100-150',18000],['150-200',22000],['200',33000]],
		'4': 	[['20',5000],['20-50',5000], ['50-100',5000], ['100-150',5000], ['150-200',5000], ['200',5000]],
		'5': 	[['20',5000],['20-50',7500], ['50-100',12500],['100-150',16500],['150-200',20000],['200',30000]],
		'6':    [['20',5000],['20-50',8000], ['50-100',13500],['100-150',18000],['150-200',22000],['200',33000]]
	};

	function r($){return String(Array.from($.children).indexOf($.querySelector(".calc__item.active"))+1)}function o($){for(let e of $)e.classList.remove("active")}document.querySelector(".calc").addEventListener("submit",function(){let $=document.querySelectorAll(".calc__item.active"),e="";for(let t of $)e+=" / "+t.textContent;document.querySelector(".result__price").value+=e})}();