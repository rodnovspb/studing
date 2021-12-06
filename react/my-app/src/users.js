import React, {useState} from 'react'
import uuid from 'react-uuid'
import User from "./user";

function id() {
  return uuid()
}


const initUsers = [
  {id: id(), name: 'user1', surname: 'surn1', age: 30, ban: true},
  {id: id(), name: 'user2', surname: 'surn2', age: 31, ban: true},
  {id: id(), name: 'user3', surname: 'surn3', age: 32, ban: true},
];


function Users() {
  let [user, setUser] = useState(initUsers)
  let items = user.map(function (elem) {
      return <User id = {elem.id} name = {elem.name} surname = {elem.surname} age = {elem.age} ban = {elem.ban} func = {banFunc}/>
  })

  function banFunc(id) {
    setUser(user.map(function (elem) {
        if(elem.id===id){
          elem.ban=false
        }
        return elem
    }))
  }


  return
}

export default Users