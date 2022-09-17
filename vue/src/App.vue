<template>
  <p>{{ currentDate() }}</p>

</template>


<script>
  export default {
      data() {
      return {
        obj: {x: 1, y: 2, z: 3},
      }
    },
    methods: {
        currentDate(){
          let date = new Date;
          return `${date.getDate()}:${date.getMonth()+1}:${date.getFullYear()}`
        }
    }
  }
</script>