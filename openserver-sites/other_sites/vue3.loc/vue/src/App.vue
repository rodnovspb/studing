<template>
  <div>
    <h2>Инпуты</h2>

    <label>
      <input v-model="social" type="checkbox" value="111"> 111
    </label>

    <label>
      <input v-model="social" type="checkbox" value="222"> 222
    </label>

    <label>
      <input v-model="social" type="checkbox" value="333"> 333
    </label>

    <hr>

    <ul>
      <li v-for="item in social">{{ item }}</li>
    </ul>
  </div>
</template>

<script>

export default {
  data(){
    return {
      social: ['222']
    }
  }
}

</script>

<style scoped>

</style>


