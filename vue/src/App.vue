<template>
  <p>{{ text }}</p>
  <button @click="show1">Одно</button>
  <button @click="show2">Второе</button>
</template>

<script>

  export default {
      data() {
      return {
        text: ""
      }
    },
    methods: {
      show1(){
          this.text = "O4wM29XOxUJ03tAq7d3LND29Q4DY4bHxs"
      },
      show2(){
        this.text = "m28lp9JSF"
      }
    }
  }

</script>