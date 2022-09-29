<template>

 <select v-model="city">
   <option>Челябинск</option>
   <option>СПб</option>
   <option>Москва</option>
 </select>

  <p>{{ city }}</p>


</template>

<script>

  export default {
        data(){
          return {
            city: 'Челябинск'
          }
        },
      }








</script>