import Main from "@/pages/Main.vue";
import {createRouter, createWebHistory} from "vue-router";
import PostPage from "@/pages/PostPage.vue";
import About from "@/pages/About.vue";
import PostIdPage from "@/pages/PostIdPage.vue";
import PostPageWithVuex from "@/pages/PostPageWithVuex.vue";
import PostPageCompositionApi from "@/pages/PostPageCompositionApi.vue";

const routes = [
	{
		path: '/',
		component: Main
	},
	{
		path: '/posts',
		component: PostPage
	},
	{
		path: '/about',
		component: About
	},
	{
		path: '/posts/:id',
		component: PostIdPage
	},
	{
		path: '/store',
		component: PostPageWithVuex
	},
	{
		path: '/composition',
		component: PostPageCompositionApi
	},
]

const router = createRouter({
	routes,
	history: createWebHistory(process.env.BASE_URL)
})

export default router