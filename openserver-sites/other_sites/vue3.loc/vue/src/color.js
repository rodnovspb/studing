export default {
	bind(el, bindings, vnode){
		// el.style.color = 'red'
		const arg = bindings.arg

		el.style[arg] = bindings.value
	}
}