<template>
  <div>{{ name }} {{ surn }} <button @click="remove(id)">Удалить</button></div>


</template>

<script>
  export default {
    props: ['id', 'name', 'surn', 'remove'],
    data(){
      return {

      }
    },

  }

</script>