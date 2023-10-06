<template>
  <div>
    <h1>Car id {{ id }}</h1>
    <button class="btn btn-sm btn-info" @click="goBack">Назад</button>
  </div>

</template>

<script>
  export default {
    data(){
      return {
        // id: this.$router.currentRoute.params['id']
        id: this.$route.params['id']
      }
    },
    watch: {
      $route(toR, fromR) {
        this.id = toR.params['id']
      }
    },
    methods: {
      goBack(){
        this.$router.push('/cars')
      }
    }
  }
</script>

<style scoped>

</style>