import React, {useState} from 'react'

function useInputValue(defaultValue='') {
  let [value, setValue] = useState(defaultValue)
  return {
    value,
    onChange: event=>setValue(event.target.value)
  }
}

function AddTodo({onCreate}) {
  const input = useInputValue('')
  function submitHandler(event) {
    event.preventDefault()
    if(input.value.trim()){
      onCreate(input.value)
      // input.clear()
    }

  }
  return (
  <form style={{marginBottom: "1rem"}} onSubmit={submitHandler}>
    <input {...input}/>
    <button type='submit'>Add todo</button>
  </form>
  )
}


export default AddTodo