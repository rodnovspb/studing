<template>
  <div>
    <button @click.once="show">Нажать</button>
  </div>
</template>


<script>

  export default {
    data(){
      return {
       text: "Текст"
      }
    },
    methods: {
      show(){
        alert(this.text)
      }
    }
  }




</script>