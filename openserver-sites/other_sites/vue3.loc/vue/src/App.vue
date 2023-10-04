<template>
  <div>
    <h2>Инпуты</h2>
    <textarea v-model="textarea">{{ textarea }}</textarea>
    <p>{{ textarea }}</p>
  </div>
</template>

<script>



export default {
  data(){
    return {
      textarea: ''
    }
  }
}

</script>

<style scoped>
  textarea {
    height: 100px;
    width: 400px;
  }
  p {
    white-space: pre;
  }
</style>


