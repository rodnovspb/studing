<template>
 <div>
  <form @submit.prevent>
    <h1>Создание статьи</h1>
    <my-input v-focus v-model="post.title"  type="text" placeholder="Введите название" />
    <my-input v-model="post.body"  type="text" placeholder="Введите текст" />
    <my-button @click="createPost" style="align-self: flex-end">Добавить</my-button>
  </form>
 </div>
</template>

<script>

 import MyButton from "@/components/UI/MyButton.vue";
 import MyInput from "@/components/UI/MyInput.vue";

 export default {
   components: {MyButton, MyInput},
    data(){
      return {
        post : {
          title: '',
          body: ''
        }
      }
    },
   methods: {
     createPost(){
       this.post.id = Date.now()
       this.$emit('create', this.post)
       this.post = {
         title: '',
         body: ''
       }
     }
   }
 };
</script>

<style scoped>
  form {
    display: flex;
    flex-direction: column;
  }

  .input {
    width: 100%;
    border: 1px solid teal;
    padding: 10px 15px;
    margin-top: 10px;
    margin-bottom: 10px;
  }


</style>