<template>
  <div>
    <h1>{{ lowercase(name) }}</h1>
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
    lowercase: function(value) {
      return value.toLowerCase();
    }
  }
};
</script>