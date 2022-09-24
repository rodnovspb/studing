<template>

    <ul>
      <li v-for="elem of products" :key="elem.id">{{ elem.name }}</li>
    </ul>



</template>


<script>

  export default {
    data(){
      return {
        products: [
          {
            id: 1,
            name: 'product1',
          },
          {
            id: 2,
            name: 'product2',
          },
          {
            id: 3,
            name: 'product3',
          },
        ],
      }
    },
    methods: {

    }
  }







</script>