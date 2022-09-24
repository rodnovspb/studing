<template>

  <table>
    <tr v-for="elem in products" :key="elem">
        <td>{{ elem.name }}</td>
        <td>{{ elem.price }}</td>
        <td>{{ elem.quantity }}</td>
    </tr>
  </table>




</template>


<script>

  export default {
    data(){
      return {
        products: [
          {
            name: 'product1',
            price: 100,
            quantity: 5
          },
          {
            name: 'product2',
            price: 200,
            quantity: 4
          },
          {
            name: 'product3',
            price: 300,
            quantity: 3
          },
        ],
      }
    },
    methods: {

    }
  }







</script>