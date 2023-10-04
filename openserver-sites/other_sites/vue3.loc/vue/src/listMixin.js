export default {
	data(){
		return {
			names: ['Денис', 'Елена', "Игорь"],
			searchName: ''
		}
	},
	computed: {
		filteredNames() {
			return this.names.filter(name => {
				return name.indexOf(this.searchName.toLowerCase()) !== -1
			})
		}
	},
}