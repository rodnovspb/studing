<template>

  <input type="text" v-model="newItem">
  <button @click="add">Добавить</button>
  <ul>
    <li v-for="item of items" :key="item">{{ item }}</li>
  </ul>


</template>

<script>

  export default {
        data(){
          return {
            items: ['a', 'b', 'c', 'd', 'e'],
            newItem: ''
          }
        },
        methods: {
          add(){
            this.items.unshift(this.newItem)
          }
        }
      }








</script>