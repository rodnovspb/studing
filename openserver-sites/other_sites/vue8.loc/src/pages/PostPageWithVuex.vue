<template>
  <div>
    <h1>{{ $store.state.isAuth ? 'Авторизован': 'Не авторизован' }}</h1>
    <h1>{{ $store.state.likes}}</h1>
    <div>
      <my-button @click="$store.commit('incrementLikes')">+</my-button>
      <my-button @click="$store.commit('decrementLikes')">-</my-button>
    </div>
    <h1>Страница со статьями</h1>
    <my-input v-model="searchQuery" placeholder="Найти" v-focus></my-input>
    <div class="app_btns">
      <my-button @click="showDialog">Создать пост</my-button>
      <my-select v-model="selectedSort" :options="sortOptions"></my-select>
    </div>

    <my-dialog v-model:show="dialogVisible">
      <post-form @create="createPost"/>
    </my-dialog>
    <post-list :posts="sortedAndSearchedPosts" @remove="removePost" v-if="!isPostLoading"/>
    <h2 v-else>Идет загрузка</h2>
    <div v-intersection="loadMorePosts" class="observer"></div>
    <!--    <div class="page__wrapper">-->
    <!--      <div v-for="pageNumber in totalPages" :key="pageNumber" class="page" :class="{'current-page': page === pageNumber}" @click="changePage(pageNumber)">{{ pageNumber }}</div>-->
    <!--    </div>-->
  </div>
</template>

<script>
  import PostForm from "@/components/PostForm.vue";
  import PostList from "@/components/PostList.vue";
  import MyDialog from "@/components/UI/MyDialog.vue";
  import axios from "axios";
  import MySelect from "@/components/UI/MySelect.vue";
  import MyInput from "@/components/UI/MyInput.vue";
  import MyButton from "@/components/UI/MyButton.vue";

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
        ],
        searchQuery: '',
        page: 1,
        limit: 9,
        totalPages: 0,
      }
    },
    components: {
      MyButton,
      MyInput,
      MySelect,
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
      // changePage(pageNumber){
      //   this.page = pageNumber
      // },
      async fetchPosts(){
        try {
          this.isPostLoading = true
          const response = await axios.get(`https://jsonplaceholder.typicode.com/posts`,
              {
                params: {
                  _page: this.page,
                  _limit: this.limit
                }
              })
          this.totalPages = Math.ceil(response.headers['x-total-count'] / this.limit)
          this.posts = response.data
        } catch (e){
          console.log('ошибка')
        } finally {
          this.isPostLoading = false
        }
      },
      async loadMorePosts(){
        try {
          this.page +=1
          const response = await axios.get(`https://jsonplaceholder.typicode.com/posts`,
              {
                params: {
                  _page: this.page,
                  _limit: this.limit
                }
              })
          this.totalPages = Math.ceil(response.headers['x-total-count'] / this.limit)
          this.posts = [...this.posts, ...response.data]
        } catch (e){
          console.log('ошибка')
        } finally {
        }
      }
    },
    mounted() {
      this.fetchPosts()
      // let options = {
      //   rootMargin: "0px",
      //   threshold: 1.0,
      // };
      //
      // let observer = new IntersectionObserver((entries, observer)=>{
      //   if(entries[0].isIntersecting && this.page < this.totalPages){
      //     this.loadMorePosts()
      //   }
      // }, options);
      // observer.observe(this.$refs.observer)
    },
    watch: {
      // page(){
      //   this.fetchPosts()
      // }
    },
    computed: {
      sortedPosts(){
        return [...this.posts].sort((post1,post2) => {return post1[this.selectedSort]?.localeCompare(post2[this.selectedSort])})
      },
      sortedAndSearchedPosts(){
        return this.sortedPosts.filter(post => post.title.toLowerCase().includes(this.searchQuery.toLowerCase()))
      }

    }
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