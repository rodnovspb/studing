let optional = {
	'.btn': ['padding', 'border', 'text-align', 'display']
};

const critical = require('critical');

critical.generate({
	base: './dist/',
	src: 'index.html',
	css: [ 'css/main.css' ],
	target: {
		css: 'css/critical.css',
		uncritical: 'css/async.css'
	},
	width: 1340,
	height: 600,
	ignore: {
		rule: [/hljs-/, /code/],
		decl: (node, value) => {
			let { selector } = node.parent;

			if(!(selector in optional)){
				return false;
			}

			return !optional[selector].includes(node.prop);
		},
	}
});

console.log('ok');