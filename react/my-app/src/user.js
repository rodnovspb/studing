import React from 'react'


function User({id, name, surname, ban, age, func}) {
  return <tr key={id}>
    <td>{name}</td>
    <td>{surname}</td>
    <td>{age}</td>
    <td>{ban ? 'Не забанен': 'Забанен'}</td>
    <td><button onClick={()=>func(id)}>Забанить</button></td>
  </tr>

}


export default User