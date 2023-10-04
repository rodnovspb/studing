<template>
  <div>
    <h2>Инпуты</h2>

    <select v-model="soc">
      <option v-for="s in social" >{{ s }}</option>
    </select>

    <hr>

    <p>{{ soc }}</p>
  </div>
</template>

<script>

export default {
  data(){
    return {
      social: ['111', '222', '333'],
      def: '333',
      soc: '222'
    }
  }
}

</script>

<style scoped>

</style>


