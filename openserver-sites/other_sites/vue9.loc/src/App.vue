<template>

<select v-model="elem">
  <option disabled value="">Выберите</option>
  <option v-for="item in options" :value="item.text">{{ item.value }}</option>
</select>

  {{ elem }}

</template>

<script>


  export default {
    data(){
      return {
        elem: '',
        options: [
          { text: 'Один', value: 'A' },
          { text: 'Два', value: 'B' },
          { text: 'Три', value: 'C' }
        ]
      }
    },
    methods: {

    }

  }

</script>

<style>

</style>
<script setup>
</script>