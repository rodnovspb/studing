<template>

  <input type="checkbox" v-model="checked">
  <p v-show="checked">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, aspernatur autem. Alias, consectetur dicta distinctio ducimus exercitationem molestiae nulla omnis pariatur perspiciatis, porro, rem saepe sit suscipit ullam voluptatem voluptates.</p>

</template>

<script>

  export default {
        data(){
          return {
            checked: true
          }
        },

      }








</script>