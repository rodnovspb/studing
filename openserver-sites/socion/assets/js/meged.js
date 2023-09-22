;(function (){
    let result = [];
    let count = 1;
    let buttons = document.querySelectorAll('.test__item')
    let quesNumber = document.querySelector('.test__ques_num span')
    if( !buttons || !buttons.length > 0) return false

    buttons.forEach(elem => {
    elem.addEventListener('click', function (e) {
    count ++;
    let parentNode = elem.closest('.test__questions')
    parentNode.querySelectorAll('.test__item').forEach(elem => elem.classList.remove('active'))
    elem.classList.add('active')
    if(count < 5){
    parentNode.classList.add('dn')
}
    showQuestion(count)
})
})

    document.querySelector('.test__arrow_back').addEventListener('click', ()=>{
    count --;
    if(count >= 1){
    showQuestion(count)
} else {
    count = 1
}
})


    function showQuestion(num){
    if(num < 5){
    let blocks = document.querySelectorAll('.test__questions')
    blocks.forEach(elem => {
    elem.classList.add('dn')
})
    let targetBlock = blocks[num - 1]
    if(typeof(targetBlock) != 'undefined' && targetBlock != null){
    targetBlock.classList.remove('dn')
    quesNumber.textContent = count
}
} else {
    getType()
}

}


    function getType(){
    document.querySelectorAll('.test__item.active').forEach(elem => {
    result.push(elem.dataset.number)
})
    if(result.length === 4){
    let res = getNumberOfType(result)
    fetch('/test-result', {
    method: "POST",
    headers: {
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
    'Accept': 'application/json',
    'Content-Type': 'application/json'
},
    body: JSON.stringify({ res: res })
})
    .then(res=>res.json())
    .then(res=>showText(res))
    .catch(e=>console.log(e))

}

}

    function getNumberOfType(arr){
    for(let num in sociotypes){
    if(arr.sort().join('') === sociotypes[num].sort().join('')){
    return num;
}
}
    return false
}

    function showText(res){
    document.querySelector('.test__wrapper').innerHTML = `
                    <h1 class="test__title">Ваш социотип ${res['name']}</h1>
                    <div class="test__description">${res['description']}</div>
                    <div class="test__description test__annotation">По тесту сразу определить социотип сложно. Кроме того описание примерное, обобщенное. Если оно совсем не подходит пройдите тест еще раз, либо пройдите <a href="/#tests">другой тест</a>. Также можно записаться на <a href="/#typing">типирование</a>.</div>
                    <div class="test__refresh"><a href="/test-meged-ovcharova">Пройти заново</a></div>`
    window.scrollTo({ top: 0, behavior: 'smooth' });
}


    let sociotypes = {
    1: [2,3,6,8],
    2: [2,4,5,7],
    3: [1,4,5,8],
    4: [1,3,6,7],
    5: [1,4,6,8],
    6: [1,3,5,7],
    7: [2,3,5,8],
    8: [2,4,6,7],
    9: [2,4,5,8],
    10: [2,3,6,7],
    11: [1,3,6,8],
    12: [1,4,5,7],
    13: [1,3,5,8],
    14: [1,4,6,7],
    15: [2,4,6,8],
    16: [2,3,5,7]
}


})()




