<template>
  <div>
    <button @click="updateCounter(1)" class="btn btn-primary m-5">+</button>
    <button @click="updateCounter(-1)" class="btn btn-info m-5">-</button>
  </div>
</template>



<script>

export default {
  data(){
    return {

    }
  },
  methods: {
    updateCounter(val){
      this.$store.state.counter += val
    }
  }
}
</script>