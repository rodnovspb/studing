<template>
  <div>
    <h1>{{ formatDate(date) }}</h1>
  </div>
</template>


<script>
export default {
  data: function() {
    return {
      date: "2020-10-05"
    };
  },
  methods: {
    formatDate: function(value) {
      let arr = value.split('-')

      return arr[2] + '-' + arr[1] + '-' + arr[0]
    }
  }
};
</script>