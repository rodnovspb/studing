import React from 'react'

function ProductField({ id, text, type, isEdit, edit }) {
  return isEdit ? <input value={text} onChange={event=>edit(id, type, event)}/> : <span>{text}</span>
}

export default ProductField