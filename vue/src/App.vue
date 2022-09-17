<template>
  <p>{{ text }}</p>
  <button @click="show">Увеличить</button>
</template>

<script>

  export default {
      data() {
      return {
        text: ""
      }
    },
    methods: {
      show(){
        this.text = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid autem mollitia vitae. Facere illum inventore ipsa iure non sed suscipit? Ad enim in labore nesciunt quam repudiandae sint ut voluptas?\n'
      }
    }
  }

</script>