import React, {useState} from 'react'
import TodoList from "./Todo/TodoList";
import Context from "./context";
import AddTodo from "./Todo/AddTodo";





function App() {


  const [todos, setTodos] = useState([
    {id: 1, completed: true, title: 'Купить хлеб'},
    {id: 2, completed: false, title: 'Купить масло'},
    {id: 3, completed: false, title: 'Купить молоко'},
  ])
  function toggleTodo(id) {
    setTodos(
    todos.map(elem=>{
      if(elem.id===id){
        elem.completed=!elem.completed
      }
      return elem
    }))
  }
 function removeTodo(id) {
    setTodos(todos.filter(todo=>todo.id!==id))
 }

 function addTodo(title) {
    setTodos(todos.concat([{
      title,
      id: Date.now(),
      completed: false
    }]))
 }


  return (
  <Context.Provider value = {{removeTodo}}>
  <div className='wrapper'>
    <h1>React</h1>
    <AddTodo onCreate={addTodo}/>
    {todos.length ? <TodoList todo={todos} onToggle={toggleTodo}/> :
    <p>Пустой список</p>}


  </div>
    </Context.Provider>

  )
}

export default App;
