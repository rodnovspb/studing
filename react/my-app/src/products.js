import React, {useState} from 'react'
import uuid from 'react-uuid'
import Product from "./product";

function id() {
 return uuid()
}

const initProds = [
 {id: id(), name: 'product1', cost: 100, isEdit: false},
 {id: id(), name: 'product2', cost: 200, isEdit: false},
 {id: id(), name: 'product3', cost: 300, isEdit: false},
];





function Products() {
 let [prod, setProd] = useState(initProds)

 function toggle(id) {
   setProd(prod.map(function (elem) {
     if(elem.id===id){
      elem.isEdit=!elem.isEdit
     }
     return elem
   }))
 }

 function edit(id, field, event) {
   setProd(prod.map(function (elem) {
     if(elem.id===id){
      elem[field] = event.target.value
     }
     return elem
   }))
 }

 let items = prod.map(function (elem) {
   return <Product
   key={elem.id}
   id = {elem.id}
   name={elem.name}
   cost = {elem.cost}
   isEdit={elem.isEdit}
   edit={edit}
   toggle={toggle}

   />
 })

 return <div>
  {items}
 </div>




}











export default Products