<template>
  <div>
    <h1>{{ price }}</h1>
  </div>
</template>


<script>

  export default {
    data(){
      return {
        cost : 200,
        amount: 15,
      }
    },
    methods: {

    },
    computed: {
      price(){
        return this.cost*this.amount
      }
    }

  }



</script>