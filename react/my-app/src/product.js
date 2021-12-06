import React from 'react'
import ProductField from "./ProductField";

function Product({id, name, cost, isEdit, edit, toggle}) {
  return <div>
		name: <ProductField
  id = {id}
  text={name}
  type='name'
  isEdit={isEdit}
  edit = {edit}
  />
  cost: <ProductField
  id = {id}
  text={cost}
  type='cost'
  isEdit={isEdit}
  edit = {edit}
  />


	  	<button onClick={()=>toggle(id)}>{isEdit? "edit":"save"}</button>
	</div>;
}

export default Product