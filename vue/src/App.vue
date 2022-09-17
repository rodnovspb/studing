<template>
  <button @click="square(5)">qqq</button>
  <button @click="square(6)">www</button>
  <button @click="square(7)">eee</button>
</template>


<script>

  export default {
      data() {
      return {

      }
    },
    methods: {
      square(num){
        alert(num**2)
      }
    }
  }

</script>