<template>

  <a href="#" @click.ctrl="func">Ссылка</a>
  <p>{{ text }}</p>

</template>

<script>

  export default {
        data(){
          return {
            text: '',

          }
        },
        methods: {
          func(){
            this.text = 1111111111
          }
        }
      }








</script>