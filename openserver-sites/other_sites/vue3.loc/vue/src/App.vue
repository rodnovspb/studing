<template>
  <div>
    <h2>Инпуты</h2>

    <select>
      <option v-for="s in social" :selected="s === def">{{ s }}</option>
    </select>

    <hr>


  </div>
</template>

<script>

export default {
  data(){
    return {
      social: ['111', '222', '333'],
      def: '333'
    }
  }
}

</script>

<style scoped>

</style>


