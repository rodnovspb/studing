<template>
  <div>
    <h1>{{ uppercase(name) }}</h1>
  </div>
</template>


<script>
export default {
  data: function() {
    return {
      name: "geeksforgeeks"
    };
  },
  methods: {
    uppercase: function(value) {
      return value.toUpperCase();
    }
  }
};
</script>