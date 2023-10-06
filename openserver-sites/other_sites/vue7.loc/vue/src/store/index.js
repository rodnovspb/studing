import Vue from "vue";
import Vuex from 'vuex'
import counter from "@/store/counter";

Vue.use(Vuex)

export default new Vuex.Store({
	modules: {
		counter: counter
	},
	state: {
		title: 'Заголовок'
	},
	getters: {
		title(state){
			return state.title + '!!!'
		}
	}
})