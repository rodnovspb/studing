<template>
  <div>
    <h1>{{ cut3(num) }}</h1>
  </div>
</template>


<script>
export default {
  data: function() {
    return {
      num: "5321234324234234322411d322"
    };
  },
  methods: {
    cut3: function(value) {
      return String(value).match(/.{1,3}/g).map(elem=>elem+=' ').join('')


    }
  }
};
</script>