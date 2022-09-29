<template>

 <select v-model="day">
   <option v-for="day of days" :key="day">{{ day }}</option>
 </select>

  <p>{{ day }}</p>


</template>

<script>

  export default {
        data(){
          return {
            days: [1,2,3,4,5,6,7],
            day: ''
          }
        },
      }








</script>