function validate(str) {
  if(typeof str !== "string"){
    return [false, 'не строка']
  }
  if(str.length<5){
    return [false, 'меньше 5 символов']
  }
  if(str.search(/[a-z]/)===-1){
    return [false, 'нет маленькой буквы']
  }
  if(str.search(/[A-Z]/)===-1){
    return [false, 'нет большой буквы']
  }
  if(str.search(/\d/)===-1){
    return [false, 'нет цифры']
  }
  if(str.search(/[-$@!()\[&>\\<|{}\]\^]/)===-1){
    return [false, 'нет спецсимвола']
  }
  if(str.search(/\s/)!==-1){
    return [false, 'пробел не нужен']
  }




  return [true]
}