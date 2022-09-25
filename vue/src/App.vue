<template>
    <button @click="sort">Сортировать</button>
    <ul>
      <li v-for="elem of arr" :key="elem">{{ elem }}</li>
    </ul>



</template>

<style>
  ul {
    background-color: #eee;
  }
</style>

<script>

  export default {
    data(){
      return {
        arr: ["Distance", "Anything", "Businessman", "Sacrifice", "Headache", "Reproduce", "Excessive", "Pretense", "Discover", "Christmas", "Calculate"],

      }
    },
    methods: {
      sort(){
        this.arr = this.arr.sort().reverse()
      }

    }
  }








</script>