<template>
  <ul>
    <li v-for="elem of arr" :key="elem">{{ elem }}</li>
  </ul>

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