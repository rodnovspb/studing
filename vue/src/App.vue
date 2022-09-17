<template>
  <div>
    <b>Привет, мир!</b>
  </div>
  <div>Имя: {{ name }}</div>
  <div>Фамилия: {{ surname }}</div>
</template>


<script>
  export default {
    name: "App",
    data(){
      return {
        text: 'page',
        href: 'page.html',
      }
    }
  }
</script>