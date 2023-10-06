export default {
	state: {
		counter: 0
	},
	mutations: {
		changeCounter(state, payload){
			state.counter += payload
		}
	},
	actions: {
		asyncChangeCounter(context, payload){
			setTimeout(()=>{
				context.commit('changeCounter', payload.counterValue)
			}, payload.delay)
		}
	},
	getters: {
		computedCounter(state){
			return state.counter * 11
		}
	},
}