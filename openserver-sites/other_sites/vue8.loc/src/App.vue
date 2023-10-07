<template>
  <div class="app">
    <post-form @create="createPost"/>
    <post-list :posts="posts" @remove="removePost"/>

  </div>
</template>

<script>
  import PostForm from "@/components/PostForm.vue";
  import PostList from "@/components/PostList.vue";

  export default {
    data(){
      return {
        posts: [
          { id: 1, title: 'Название 1', body: 'Lorem ipsum dolor sit amet.'},
          { id: 2, title: 'Название 2', body: 'Lorem ipsum dolor sit amet.'},
          { id: 3, title: 'Название 3', body: 'Lorem ipsum dolor sit amet.'},
        ],
      }
    },
    components: {
      PostForm, PostList
    },
    methods: {
      createPost(post){
       this.posts.push(post)
      },
      removePost(post){
        this.posts = this.posts.filter(p => p.id !== post.id)
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