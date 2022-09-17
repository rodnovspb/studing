<template>
  <div>
    <h1>{{ round(root(num)) }}</h1>
  </div>
</template>


<script>
export default {
  data: function() {
    return {
      num: 12124
    };
  },
  methods: {
    root: function(value) {
      return Math.sqrt(value)
    },
    round(num){
      return num.toFixed(2)
    }
  }
};
</script>