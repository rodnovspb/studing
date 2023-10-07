<template>
  <div>
    <div>Количество лайков: {{ likes }}</div>
    <div>Количество дизлайков: {{ dislikes }}</div>
    <button @click="addLike">+</button>
    <button @click="addDisLike">-</button>
  </div>
</template>

<script>
  export default {
    data(){
      return {
        likes: 0,
        dislikes: 0
      }
    },
    methods: {
      addLike(){
        this.likes +=1
      },
      addDisLike(){
        this.dislikes +=1
      }
    }
  }
</script>

<style>

</style>