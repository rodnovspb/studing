import VueRouter from 'vue-router'
import Home from "@/pages/Home.vue";
import Cars from "@/pages/Cars.vue";
import Car from "@/components/Car.vue";
import ErrorCmp from "@/components/Error.vue";
import CarFull from "@/components/CarFull.vue";


export default new VueRouter ({
	routes: [
		{
			path: '', // localhost:8080
			component: Home
		},
		{
			path: '/cars', // localhost:8080
			component: Cars,
			name: 'cars'
		},
		{
			path: '/car/:id',
			component: Car,
			children: [
				{
					path: 'full',
					component: CarFull,
					name: 'carFull',
					beforeEnter(to, from, next){
						next()
					}
				}
			]
		},
		{
			path: '/none',
			redirect: {
				name: 'cars'
			}
		},
		{
			path: '*',
			component: ErrorCmp
		}
	],
	mode: 'history',
	scrollBehavior(to, from, savedPosition){
		if(savedPosition){
			return savedPosition
		}
		if(to.hash){
			return { selector: to.hash }
		}
		return {
			x: 0,
			y: 700
		}
	}
})