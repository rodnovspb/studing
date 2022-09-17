<template>
  <div>
    <h1>{{ cut3(num) }}</h1>
  </div>
</template>


<script>
export default {
  data: function() {
    return {
      num: 532423543453456214
    };
  },
  methods: {
    cut3: function(value) {
      let str = String(value)
      let str2 = ''
      for(let i=0; i<str.length; i++){
        if(i%3===0){
          str2 += str[i]
          str2+= ' '
        } else {
          str2 += str[i]
        }

      }
      return str2
    }
  }
};
</script>