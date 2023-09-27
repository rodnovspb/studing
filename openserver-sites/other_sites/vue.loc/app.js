console.log(Vue)

const app = {
	data(){
		return {
			title: 'Вью',
			item: "",
			items: [
				{
					id: 1,
					avatar: `https://api.dicebear.com/7.x/croodles/svg?seed=1`,
					body: 'hello 1',
					date: new Date(Date.now()).toLocaleString()
				},
				{
					id: 2,
					avatar: `https://api.dicebear.com/7.x/croodles/svg?seed=2`,
					body: 'hello 2',
					date: new Date(Date.now()).toLocaleString()
				},
			],
		}
	},
	methods: {
		onSubmit(e){
			this.items.push({
				id: Math.round(Math.random()*30),
				avatar: `https://api.dicebear.com/7.x/croodles/svg?seed=${Date.now()}`,
				body: this.item,
				date: new Date(Date.now()).toLocaleString()
			})
			this.item = ''
		}
	}
};

Vue.createApp(app).mount('#app')