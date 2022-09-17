<template>
  <button @click="show">Дата</button>

</template>


<script>

  export default {
      data() {
      return {
       num: '18.09.2022',
      }
    },
    methods: {
      show(){
        console.log(this.dayOfWeek(this.num))
      },
      dayOfWeek(num){
        let arr = num.split('.')
        let date = new Date(arr[2], arr[1]-1, arr[0])
        return date.getDay()
      }
    }
  }

</script>