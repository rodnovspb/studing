<template>

  <a href="#" @click.left="func('left')" @click.right="func('right')" @click.middle="func('middle')">Ссылка</a>
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
          func(str){
            this.text = str
          }
        }
      }








</script>