<script setup>
  import MyHello from '@/components/MyHello.vue'

</script>


<template>
  <MyHello title="1" :price = '9500 + 1000' :isAdded="true" />
  <MyHello title="2" :price = '8500' :isAdded="true" />
  <MyHello title="3" :price = '7500' :isAdded="false" />
  <MyHello title="4" :price = '6500' :isAdded="true" />
  <MyHello title="5" :price = '5500' :isAdded="true" />
</template>


<style scoped>

</style>

