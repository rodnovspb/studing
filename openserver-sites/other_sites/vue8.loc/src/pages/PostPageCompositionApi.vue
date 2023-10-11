<template>
  <div>
    <h1>{{ likes }}</h1>
    <my-button @click="addLike">+</my-button>
    <h1>Страница со статьями</h1>
<!--    <my-input v-model="searchQuery" placeholder="Найти" v-focus></my-input>-->
<!--    <div class="app_btns">-->
<!--      <my-button @click="showDialog">Создать пост</my-button>-->
<!--      <my-select v-model="selectedSort" :options="sortOptions"></my-select>-->
<!--    </div>-->

<!--    <my-dialog v-model:show="dialogVisible">-->
<!--      <post-form @create="createPost"/>-->
<!--    </my-dialog>-->
<!--    <post-list :posts="sortedAndSearchedPosts" @remove="removePost" v-if="!isPostLoading"/>-->
<!--    <h2 v-else>Идет загрузка</h2>-->
<!--    <div v-intersection="loadMorePosts" class="observer"></div>-->
  </div>
</template>

<script>
  import PostForm from "@/components/PostForm.vue";
  import PostList from "@/components/PostList.vue";
  import MyDialog from "@/components/UI/MyDialog.vue";
  import axios from "axios";
  import MySelect from "@/components/UI/MySelect.vue";
  import MyInput from "@/components/UI/MyInput.vue";
  import {ref} from "vue";
  import MyButton from "@/components/UI/MyButton.vue";

  export default {
    data(){
      return {
        dialogVisible: false,
        sortOptions: [
          {value: 'title', name: 'По названию'},
          {value: 'body', name: 'По содержимому'},
        ],
      }
    },
    setup(props){
      const likes = ref(2)

      const addLike = () => {
        likes.value +=1
      }
      return {
        likes, addLike
      }
    },
    components: {
      MyButton,
      MyInput,
      MySelect,
      MyDialog, PostForm, PostList
    },
    methods: {

    },
  }
</script>

<style scoped>
  .app_btns {
    display: flex;
    justify-content: space-between;
    margin: 20px 0;
  }

  .page__wrapper {
    display: flex;
    margin-top: 15px;
  }

  .page {
    border: 1px solid black;
    padding: 10px;
    cursor: pointer;
  }

  .current-page {
    border: 2px solid green;
    background: green;
    color: aliceblue;
  }

  .observer {
    height: 30px;
    background: green;
  }

</style>