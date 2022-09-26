<template>
  <textarea v-model="text"></textarea>
  <button @click="cut">Показать</button>
  <ul></ul>

</template>

<script>

  export default {
        data(){
          return {
            text: '',
            result: ''

          }
        },
        methods: {
          cut(){
            let text = this.text
            let arr = text.match(/\p{L}+/gu)
            let inner = ''
            arr.forEach(elem=>{
              inner += `<li>${elem}</li>`
            })
            document.querySelector('ul').innerHTML = inner
          }
        }
      }








</script>