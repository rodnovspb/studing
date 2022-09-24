<template>

  <ul v-for="(elem, key) in obj" :key="key">
    <li>{{ elem }}</li>
  </ul>

</template>


<script>

  export default {
    data(){
      return {
        obj: {
          user1: '100$',
          user2: '200$',
          user3: '300$',
        },
      }
    },
    methods: {

    }
  }







</script>