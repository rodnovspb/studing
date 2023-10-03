export default {
	bind(el, bindings, vnode){

		const fontModifier = bindings.modifiers['font']
		const delayModifier = bindings.modifiers['delay']

		if(fontModifier){
			el.style.fontSize = '30px'
		}
		let delay = 0
		if(delayModifier){
			delay=2000
		}
		setTimeout(()=>{
			const arg = bindings.arg
			el.style[arg] = bindings.value
		}, delay)
	}
}