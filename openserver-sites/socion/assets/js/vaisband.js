;(function (){
    let result = [];
    let count = 1;
    let buttons = document.querySelectorAll('.test__item')
    let quesNumber = document.querySelector('.test__ques_num span')
    if( !buttons || !buttons.length > 0) return false

    let quustions = {
        0: [1,2],
        1: [3,4],
        2: [5,6],
        3: [7,8],
        4: [9,10],
        5: [11,12],
        6: [13,14],
        7: [29,30],
        8: [27,28],
        9: [23,24],
        10: [25,26],
        11: [21,22],
        12: [19,20],
        13: [15,16],
        14: [17,18]
    }

    buttons.forEach(elem => {
        elem.addEventListener('click', function (e) {
            count ++;
            let parentNode = elem.closest('.test__questions')
            parentNode.querySelectorAll('.test__item').forEach(elem => elem.classList.remove('active'))
            elem.classList.add('active')
            if(count < 5){
                parentNode.classList.add('dn')
            }
            showQuestion(count, elem.dataset.number)
        })
    })

    document.querySelector('.test__arrow_back').addEventListener('click', ()=>{
        count --;
        if(count >= 1){
            let blocks = document.querySelectorAll('.test__questions')
            blocks.forEach(elem => {
                elem.classList.add('dn')
            })
            document.querySelectorAll('.test__questions')[count-1].classList.remove('dn')
        } else {
            count = 1
        }
    })


    function showQuestion(num, activeElemNumber){
        if(num < 5){
            let blocks = document.querySelectorAll('.test__questions')
            blocks.forEach(elem => {
                elem.classList.add('dn')
            })
            let targetBlock = blocks[num - 1]
            if(typeof(targetBlock) != 'undefined' && targetBlock != null){
                targetBlock.classList.remove('dn')
                targetBlock.querySelectorAll('.test__item').forEach(elem => {
                    elem.classList.add('dn')
                    if(quustions[activeElemNumber].includes(Number(elem.dataset.number))){
                        elem.classList.remove('dn')
                    }
                })
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
                    <div class="test__refresh"><a href="/test-vaisbanda">Пройти заново</a></div>`
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }


    let sociotypes = {
        1: [1,3,7,29], //дон
        2: [1,4,10,26], //дюма
        3: [2,6,13,16], //гюго
        4: [2,5,12,19], //роб
        5: [2,6,13,15], //гам
        6: [2,5,12,20], //макс
        7: [1,4,9,23], //жук
        8: [1,3,8,28], //есен
        9: [1,4,9,24], //нап
        10: [1,3,8,27], //баль
        11: [2,5,11,21], //джек
        12: [2,6,14,18], //драй
        13: [2,5,11,22], //штир
        14: [2,6,14,17], //дост
        15: [1,3,7,30], //гек
        16: [1,4,10,25] //габ
    }


})()
