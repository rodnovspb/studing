<template>
  <button @click="toggle1">Абзац 1</button>
  <button @click="toggle2">Абзац 2</button>
  <button @click="toggle3">Абзац 3</button>
  <p v-if="!hidden1">Абзац 1</p>
  <p v-if="!hidden2">Абзац 2</p>
  <p v-if="!hidden3">Абзац 3</p>
</template>


<script>

  export default {
   data(){
     return {
       hidden1: true,
       hidden2: true,
       hidden3: true,
     }
   },
    methods: {
     toggle1(){
       this.hidden1 = !this.hidden1
     },
      toggle2(){
        this.hidden2 = !this.hidden2
      },
      toggle3(){
        this.hidden3 = !this.hidden3
      },
    }
  }







</script>