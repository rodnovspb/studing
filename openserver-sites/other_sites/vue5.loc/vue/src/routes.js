import VueRouter from 'vue-router'
import Home from "@/pages/Home.vue";
import Cars from "@/pages/Cars.vue";
import Car from "@/components/Car.vue";
import CarFull from "@/components/CarFull.vue";


export default new VueRouter ({
	routes: [
		{
			path: '', // localhost:8080
			component: Home
		},
		{
			path: '/cars', // localhost:8080
			component: Cars
		},
		{
			path: '/car/:id',
			component: Car,
			children: [
				{
					path: 'full',
					component: CarFull,
					name: 'carFull'
				}
			]
		}
	],
	mode: 'history'
})