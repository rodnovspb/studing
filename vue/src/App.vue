<template>
  <button @mouseover="currentDate">Дата</button>
  <p @load="func"></p>

</template>


<script>
  export default {
      data() {
      return {
        num1: 1,
        num2: 2,
      }
    },
    methods: {
        currentDate(){
          let date = new Date;
          alert (`${date.getDate()}:${date.getMonth()+1}:${date.getFullYear()}`)
        },
        func(){
          let sum = this.num1 + this.num2
          alert(sum)
        }
    }
  }
</script>