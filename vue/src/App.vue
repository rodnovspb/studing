<template>

 <input type="radio" v-model="choice" value="1">
 <input type="radio" v-model="choice" value="2">
 <input type="radio" v-model="choice" value="3">

  <p>{{ choice }}</p>
</template>

<script>

  export default {
        data(){
          return {
            choice: "",
          }
        }

      }








</script>