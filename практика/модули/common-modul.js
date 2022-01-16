// при common модулях нужно отключить "type": "module" в паккадже
// соответственно ES6 и коммон в одном файле не запустятся

function f1() {
  console.log('модуль common')
}

module.exports =  f1