<template>
  <div>
    <h1>{{ capitalizeWords(name) }}</h1>
  </div>
</template>


<script>
export default {
  data: function() {
    return {
      name: "geeksforgeeks werfwe werwer wersadfstd werwer"
    };
  },
  methods: {
    capitalizeWords: function(value) {
      return value.split(' ').map(elem=>{return elem[0].toUpperCase() + elem.slice(1)}).join(' ');
    }
  }
};
</script>