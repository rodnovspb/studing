<template>
  <div>
    <b>Привет, мир!</b>
  </div>
  <div>Имя: {{ name }}</div>
  <div>Фамилия: {{ surname }}</div>
  <a :href="href">{{ text }}</a>
</template>


<script>
  export default {
    data(){
      return {
        num: 5
      }
    }
  }
</script>