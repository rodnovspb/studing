<template>
  <button @click="show">{{ isAuth? "Скрыть":"Показать" }}</button>
  <p v-show="isAuth">Lorem ipsum dolor sit amet.</p>
</template>


<script>

  export default {
    data(){
      return {
        isAuth: true
      }
    },
    methods: {
      show(){
        this.isAuth = !this.isAuth
      }
    }
  }







</script>