<template>
  <p>{{ text }}</p>
  <button @click="show">Увеличить</button>
</template>

<script>

  export default {
      data() {
      return {
        text: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid autem mollitia vitae. Facere illum inventore ipsa iure non sed suscipit? Ad enim in labore nesciunt quam repudiandae sint ut voluptas?"
      }
    },
    methods: {
      show(){
        this.text = this.text.split('').sort(function(){return 0.5-Math.random()}).join('');

      }
    }
  }

</script>