<template>
  <div class="app">
    <h1>Страница со статьями</h1>
    <div class="app_btns">
      <my-button @click="showDialog">Создать пост</my-button>
      <my-select v-model="selectedSort" :options="sortOptions"></my-select>
    </div>

    <my-dialog v-model:show="dialogVisible">
      <post-form @create="createPost"/>
    </my-dialog>
    <post-list :posts="posts" @remove="removePost" v-if="!isPostLoading"/>
    <h2 v-else>Идет загрузка</h2>
  </div>
</template>

<script>
  import PostForm from "@/components/PostForm.vue";
  import PostList from "@/components/PostList.vue";
  import MyDialog from "@/components/UI/MyDialog.vue";
  import MyButton from "@/components/UI/MyButton.vue";
  import axios from "axios";
  import MySelect from "@/components/UI/MySelect.vue";

  export default {
    data(){
      return {
        posts: [],
        dialogVisible: false,
        isPostLoading: false,
        selectedSort: '',
        sortOptions: [
          {value: 'title', name: 'По названию'},
          {value: 'body', name: 'По содержимому'},
        ]
      }
    },
    components: {
      MySelect,
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
          this.isPostLoading = true
            const response = await axios.get('https://jsonplaceholder.typicode.com/posts?_limit=10')
            this.posts = response.data
        } catch (e){
          console.log('ошибка')
        } finally {
          this.isPostLoading = false
        }
      }
    },
    mounted() {
      this.fetchPosts()
    },
    watch: {
      selectedSort(newValue){
        console.log(newValue)
      },
      posts: {
        handler(val){

        },
        deep: true
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

  .app_btns {
    display: flex;
    justify-content: space-between;
    margin: 20px 0;
  }


</style>