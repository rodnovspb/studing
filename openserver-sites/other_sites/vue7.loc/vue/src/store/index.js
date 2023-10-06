import Vue from "vue";
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
	state: {
		counter: 0
	},
	getters: {
		computedCounter(state){
			return state.counter * 11
		}
	}
})