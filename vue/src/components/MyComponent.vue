<template>
  <template v-if="!isEdit">
    <div>{{ name }} {{ surn }} <button @click="edit">редактировать</button></div>
  </template>
  <template v-else>
    <div><input v-model="newName"> <input v-model="newSurn"><button @click="save">сохранить</button></div>
</template>



</template>

<script>
  export default {
    props: {
      id: Number,
      name: String,
      surn: String,
      change: Function,
    },
    data(){
      return {
        isEdit: false,
        newName: this.name,
        newSurn: this.surn,
      }
    },
    methods: {
      edit(){
        this.isEdit = true
      },
      save(){
        this.isEdit = false
        this.change(this.id, this.newName, this.newSurn)

      }
    }
  }

</script>