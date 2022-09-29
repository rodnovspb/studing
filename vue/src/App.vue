<template>

 <div><label> Английский <input type="radio"  v-model="lang" value="Английский"></label></div>
 <div><label> Русский <input type="radio"  v-model="lang" value="Русский"></label></div>
 <div><label> Испанский <input type="radio"  v-model="lang" value="Испанский"></label></div>


  <p v-if="lang==='Английский'">Английский</p>
  <p v-if="lang==='Русский'">Русский</p>
  <p v-if="lang==='Испанский'">Испанский</p>
</template>

<script>

  export default {
        data(){
          return {
            lang: ''
          }
        },
      }








</script>