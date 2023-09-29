<template>
  <div class="car">
    <h2>Название: {{ carName }} \ {{ reverseName }}</h2>
    <h2>Год: {{ carYear }}</h2>
    <button @click="changeName">Изменить имя</button>
  </div>
</template>

<script>
  export default {
    props: {
      carName: {
        type: String,
        required: true,
        default: 'По умолчанию'
      },
      carYear: Number
    },
    methods: {
      changeName(){
        this.$emit('nameChanged', '123')
      }
    },
    computed: {
      reverseName(){
        return this.carName.split('').reverse().join('')
      }
    }
  }
</script>

<style>
  .car {
    border: 1px solid black;
  }
  .car h3 {
    margin-bottom: 5px;
  }
</style>