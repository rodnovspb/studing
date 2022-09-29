<template>

 <div><label> Английский <input type="radio" v-model="language"  value="Английский"></label></div>
 <div><label> Русский <input type="radio" v-model="language" value="Русский"></label></div>
 <div><label> Испанский <input type="radio" v-model="language" value="Испанский"></label></div>

  <p>{{ language }}</p>
</template>

<script>

  export default {
        data(){
          return {
            language: "",
          }
        }

      }








</script>