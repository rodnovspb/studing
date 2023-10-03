<template>
  <div>
    <h2>Машина</h2>
    <slot name="title"></slot>
    <hr>
    <hr>
    <slot name="text"></slot>
  </div>
</template>

<script>
  export default {

  }
</script>

<style scoped>
  div {
    border: 3px solid silver;
    padding: 10px;
  }

  h2 {
    color: green;
  }
</style>
