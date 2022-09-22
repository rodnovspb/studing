<template>
  <p v-if="isAuth">авторизован</p>
  <p v-else>не авторизован</p>
</template>


<script>

  export default {
    data(){
      return {
        isAuth: false
      }
    }
  }







</script>