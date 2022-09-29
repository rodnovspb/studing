<template>

  <ul>
    <li v-for="(item, index) of items" :key="index">
      {{ item }}
      <button @click="remove(index)">удалить</button>
    </li>
  </ul>


</template>

<script>

  export default {
        data(){
          return {
            items: ['a', 'b', 'c', 'd', 'e'],
          }
        },
        methods: {
          remove(i){
            this.items.splice(i, 1)
          }
        }
      }








</script>