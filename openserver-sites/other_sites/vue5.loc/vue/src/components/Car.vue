<template>
  <div>
    <h1>Car id {{ id }}</h1>
    <button class="btn btn-sm btn-danger mb-2" @click="goBack">Назад</button>
    <br>
    <router-link
        class="btn btn-info mt-2"
        tag="button"
        :to="{ name: 'carFull', params: {id: id}, query: {name: '555', year: 2000}, hash: '#scroll' }"
    >Полные сведения</router-link>
    <hr>
    <router-view></router-view>
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
      },
    },
    beforeRouteLeave(to, from, next){
      console.log('beforeRouteLeave')
      if(window.confirm('Уверены?')){
        next()
      } else {
        next(false)
      }
    }
  }
</script>

<style scoped>

</style>