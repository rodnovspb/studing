<template>
  <div>
    <p>Стоимость: {{ price }}</p>
    <button @click="inc">Увеличить</button>
  </div>
</template>


<script>

  export default {
    data(){
      return {
        cost: 100,
        amount: 20
      }
    },
    methods: {
      inc(){
        this.amount++
      }
    },
    computed: {
      price(){
        return this.cost*this.amount
      }
    }
  }




</script>