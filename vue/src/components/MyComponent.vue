<template>
    <button v-on:click="func">Нажать</button>
</template>

<script>
  export default {
    props: {
      func: Function,
    },
    data(){
      return {

      }
    },
    methods: {

    }
  }

</script>