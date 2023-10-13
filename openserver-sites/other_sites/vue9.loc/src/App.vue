<template>

  <div v-if="flag">Lorem ipsum dolor sit amet.</div>
  <app-button v-model="flag"></app-button>

</template>

<script>


  import Button from "@/components/Button.vue";

  export default {
    data(){
      return {
        flag: true
      }
    },
    methods: {

    },

    components: {
      'app-button': Button
    }


  }

</script>

<style>

</style>
<script setup>
</script>