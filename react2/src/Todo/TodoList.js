import React from 'react'
import TodoItem from "./TodoItem";
import PropTypes from 'prop-types'



const styles = {
  ul: {
    listStyle: 'none',
    margin: 0,
    padding: 0,
  }
}

function TodoList(props) {
  return (
    <ul style={styles.ul}>
      {props.todo.map((todo, index)=>{
      return <TodoItem
      onchange={props.onToggle}
      todo = {todo}
      key = {todo.id}
      index={index}/>
      }
      )}
    </ul>


  )


}

TodoList.propTypes = {
  todo: PropTypes.arrayOf(PropTypes.object).isRequired,
  onToggle: PropTypes.func.isRequired
}




export default TodoList