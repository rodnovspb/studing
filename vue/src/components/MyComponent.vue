<template>
    <button v-on:click="funcPlus">Показать +</button>
    <button v-on:click="funcMin">Показать -</button>
</template>

<script>
  export default {
    props: {
      funcPlus: Function,
      funcMin: Function,
    },
    data(){
      return {

      }
    },

  }

</script>