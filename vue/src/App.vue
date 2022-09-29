<template>

  <select v-model="day">
    <option v-for="day of days" :key="day">{{ day }}</option>
  </select>
  <select v-model="month">
    <option v-for="month of months" :key="month">{{ month }}</option>
  </select>
  <select v-model="year">
    <option v-for="year of years" :key="year">{{ year }}</option>
  </select>

<p>{{ day }} {{ month }} {{ year }}</p>



</template>

<script>

  export default {
        data(){
          return {
            days: [1,2,3,4,5,6,7],
            months: [21,2,3,4,5,6,7],
            years: [31,2,3,4,5,6,7],
            day: '',
            month: '',
            year: '',
          }
        },
      }








</script>