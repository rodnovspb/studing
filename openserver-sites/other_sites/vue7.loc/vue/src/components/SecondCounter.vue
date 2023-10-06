<template>
  <div>
    <h2>Второй счетчик: {{ counter }}</h2>
  </div>
</template>



<script>

export default {
  data(){
    return {

    }
  },
  computed: {
    counter(){
      return this.$store.getters.computedCounter
    }
  }
}
</script>