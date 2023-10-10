export default {
	mounted(el, binding) {
		let options = {
		  rootMargin: "0px",
		  threshold: 1.0,
		};

		let observer = new IntersectionObserver((entries, observer)=>{
		  if(entries[0].isIntersecting){
			  binding.value()
		  }
		}, options);
		observer.observe(el)
	},
	name: 'intersection'
}