<template>

  <ul v-for="(elem, key) in arr" :key="key">
    <li>{{ key }}</li>
  </ul>

</template>


<script>

  export default {
    data(){
      return {
        arr: ['x', 'y', 'z'],
      }
    },
    methods: {

    }
  }







</script>