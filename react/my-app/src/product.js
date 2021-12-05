import React from 'react'

function Product({ name, cost }) {
  return <div>
		name: <span>{name}</span>,
		cost: <span>{cost}</span>
	</div>;
}

export default Product