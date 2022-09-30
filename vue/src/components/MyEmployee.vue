<template>
  <p v-for="elem of arr" :key="elem">{{ elem }}</p>
</template>

<script>
  export default {
    props: ['arr'],
    data(){
      return {

      }
    }
  }


</script>