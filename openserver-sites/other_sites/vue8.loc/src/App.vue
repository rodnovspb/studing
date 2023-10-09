<template>
  <div class="app">
    <h1>Страница со статьями</h1>
    <my-button @click="fetchPosts">Фетч</my-button>
    <my-button @click="showDialog" style="margin: 20px 0">Создать пост</my-button>
    <my-dialog v-model:show="dialogVisible">
      <post-form @create="createPost"/>
    </my-dialog>
    <post-list :posts="posts" @remove="removePost"/>
  </div>
</template>

<script>
  import PostForm from "@/components/PostForm.vue";
  import PostList from "@/components/PostList.vue";
  import MyDialog from "@/components/UI/MyDialog.vue";
  import MyButton from "@/components/UI/MyButton.vue";
  import axios from "axios";

  export default {
    data(){
      return {
        posts: [],
        dialogVisible: false,
      }
    },
    components: {
      MyButton,
      MyDialog, PostForm, PostList
    },
    methods: {
      createPost(post){
       this.posts.push(post)
        this.dialogVisible = false
      },
      removePost(post){
        this.posts = this.posts.filter(p => p.id !== post.id)
      },
      showDialog(){
        this.dialogVisible = true
      },
      async fetchPosts(){
        try {
          const response = await axios.get('https://jsonplaceholder.typicode.com/posts?_limit=10')
          this.posts = response.data
        } catch (e){
          console.log('ошибка')
        }
      }
    }
  }
</script>

<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  .app {
    padding: 20px;
  }


</style>