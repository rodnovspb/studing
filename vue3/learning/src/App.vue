<script setup>
  import {ref} from "vue";

  const className = ref('red')

  const func = () => {
    className.value === 'red' ? className.value = 'green' : className.value = 'red'
  }

</script>


<template>
<div :class="className">Lorem ipsum dolor sit amet.</div>

<button @click="func">Изменить</button>


</template>


<style scoped>
  .red {
    color: red;
  }

  .green {
    color: green;
  }

</style>