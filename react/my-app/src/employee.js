import React from 'react'


function Employee({surname, name, patronymic, salary}) {
  return <div>
    surname: {surname} <br/>
    name: {name} <br/>
    patronymic: {patronymic} <br/>
    salary: {salary} <br/>
  </div>
}

export default Employee