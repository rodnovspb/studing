// при common модулях нужно отключить "type": "module" в паккадже
// соответственно ES6 и коммон в одном файле не запустятся
// а при ES6 (import, export) добавлять "type": "module"

function f1() {
  console.log('модуль common')
}

module.exports =  f1