import React, {useContext} from 'react'
import PropTypes from 'prop-types'
import Context from "../context";


const styles = {
  li: {
    display:  'flex',
    justifyContent: "space-between",
    alignItems: 'center',
    padding: ".5rem 1rem",
    border: "1px solid #ccc",
    borderRadius: "4px",
    marginBottom: '.5rem'
  },
  input: {
    marginRight: '.5rem'
  }
}

function TodoItem({todo, index, onchange}) {
  const {removeTodo}=useContext(Context)
  let classes = []
  if(todo.completed){
    classes.push('done')
  }

  return (
    <li style={styles.li}>
      <span className={classes.join(' ')}>
        <input
        type="checkbox"
        style={styles.input}
        onChange={()=>onchange(todo.id)}
        checked={todo.completed}
        />
        <strong>{index+1}</strong>
        &nbsp;
        {todo.title}
      </span>
      <button className='rm' onClick={()=>removeTodo(todo.id)}>&times;</button>
      </li>

  )
}

TodoItem.propTypes = {
  todo: PropTypes.object.isRequired,
  index: PropTypes.number,
  onchange: PropTypes.func.isRequired
}





export default TodoItem