<template>
  <p v-if="visible">lorem1</p>
  <p v-if="!visible">lorem2</p>
</template>


<script>

  export default {
    data(){
      return {
        visible: false
      }
    }
  }





</script>