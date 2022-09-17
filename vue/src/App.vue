<template>
  <button @click="show">Дата</button>

</template>


<script>

  export default {
      data() {
      return {
       num: 5,
      }
    },
    methods: {
      show(){
        console.log(this.dayOfWeek(this.num))
      },
      dayOfWeek(num){
        return ['п', 'в', "с", "ч", "пт", "сб", "вск"][num+1]
      }
    }
  }

</script>