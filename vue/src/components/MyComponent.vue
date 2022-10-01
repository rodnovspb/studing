<template>
    <button @click="func(a,b)">ыфваыфа</button>

</template>

<script>
  export default {
    props: ['func'],
    data(){
      return {
        a: 'Денис',
        b: 800000,
      }
    },

  }

</script>