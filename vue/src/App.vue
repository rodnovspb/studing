<template>

  <label>русский <input type="checkbox" v-model="arr" value="русский"></label><br>
  <label>английский <input type="checkbox" v-model="arr" value="английский"></label><br>
  <label>немецкий <input type="checkbox" v-model="arr" value="немецкий"></label>
  <button @click="show">Показать</button>
  <p>{{ text }}</p>

</template>

<script>

  export default {
        data(){
          return {
            arr: [],
            text: ''
          }
        },
        methods: {
          show(){
            this.arr.forEach(elem=>{
              this.text += elem +", "
            })
          }
        }

      }








</script>