import React from 'react'

function Product({id, name, cost, isEdit, edit, toggle}) {
  return <div>
		name: {isEdit ? <input value={name} onChange={event=>edit(id, 'name', event)}/>: <span>{name}</span>}
		cost: {isEdit ? <input value={cost} onChange={event=>edit(id, 'cost', event)}/>: <span>{cost}</span>}

	  	<button onClick={()=>toggle(id)}>{isEdit? "edit":"save"}</button>
	</div>;
}

export default Product