<template>
    <button @click="add">Удалить</button>
    <ul>
      <li v-for="elem of arr" :key="elem">{{ elem }}</li>
    </ul>



</template>


<script>

  export default {
    data(){
      return {
        arr: ["Distance", "Anything", "Businessman", "Sacrifice", "Headache", "Reproduce", "Excessive", "Pretense", "Discover", "Christmas", "Calculate"],
      }
    },
    methods: {
      add(){
        this.arr.splice(this.arr.length-2,1)
      }
    }
  }









</script>