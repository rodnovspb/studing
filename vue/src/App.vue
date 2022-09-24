<template>
    <button @click="add">Добавить</button>
    <ul>
      <li v-for="elem of arr" :key="elem">{{ elem }}</li>
    </ul>



</template>


<script>

  export default {
    data(){
      return {
        arr: ['a', 'b', 'c', 'd'],
      }
    },
    methods: {
      add(){
        this.arr.pop()
      }
    }
  }







</script>