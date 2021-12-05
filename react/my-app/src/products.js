import React, {useState} from 'react'
import uuid from 'react-uuid'
import Product from "./product";

function id() {
 return uuid()
}

const initProds = [
 {id: id(), name: 'product1', cost: 100},
 {id: id(), name: 'product2', cost: 200},
 {id: id(), name: 'product3', cost: 300},
];


function Products() {

 let [prods, setProds] = useState(initProds)

let items = prods.map(function (elem) {

 return <Product
 key = {elem.id}
 name = {elem.name}
 cost = {elem.cost}
 />

})


 return <div>
  {items}
 </div>




}











export default Products