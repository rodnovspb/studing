<template>
  <p v-if="age < 18">Подросток</p>
  <p v-else-if="age > 18 && age < 26">МЧ</p>
  <p v-else-if="age >= 26">Мужчина</p>
</template>


<script>

  export default {
    data(){
      return {
        age: 5
      }
    }
  }







</script>