import {obj} from "./script.js";

//меняем имя для первого модуля тоже
obj.name = 'другое имя'

export function func() {
	console.log(`Имя: ${obj.name}`)
}