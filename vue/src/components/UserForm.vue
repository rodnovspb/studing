<template>
  <input type="text" v-model="newName" v-model="newSurn">
  <button @click="save">Сохранить</button>
</template>


<script>
  export default {
    data(){
      return {
        newName: '',
        newSurn: '',
      }
    },
    methods() {
      save(){
        this.$emit('add', this.newName, this.newSurn)
      }
    }
  }
</script>