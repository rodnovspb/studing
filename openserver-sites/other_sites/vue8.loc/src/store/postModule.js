export const postModule = {
	state: ()=>({
		posts: [],
		isPostLoading: false,
		selectedSort: '',
		sortOptions: [
			{value: 'title', name: 'По названию'},
			{value: 'body', name: 'По содержимому'},
		],
		searchQuery: '',
		page: 1,
		limit: 9,
		totalPages: 0,
	}),
	getters: {

	},
	mutations: {
		setPosts(state, posts){
			state.posts = posts
		}
	},
	actions: {

	}
}