<template>
  <div>
    <h2>Инпуты</h2>

    <label>
      <input v-model="social" type="radio" value="111"> 111
    </label>

    <label>
      <input v-model="social" type="radio" value="222"> 222
    </label>

    <label>
      <input v-model="social" type="radio" value="333"> 333
    </label>

    <hr>

    <p>{{ social }}</p>
  </div>
</template>

<script>

export default {
  data(){
    return {
      social: '333'
    }
  }
}

</script>

<style scoped>

</style>


