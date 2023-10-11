<template>
 <div class="navbar">
   <h1 @click="$router.push('/')">Вью 3</h1>
   <div class="navbar__btns">
     <my-button @click="$router.push('/posts')">Статьи</my-button>
     <my-button style="margin-left: 20px;" @click="$router.push('/about')">О компании</my-button>
     <my-button style="margin-left: 20px;" @click="$router.push('/store')">Store Vuex</my-button>
     <my-button style="margin-left: 20px;" @click="$router.push('/composition')">Composition</my-button>
   </div>
 </div>
</template>

<script>


 export default {
  name: 'navbar'
  };
</script>

<style scoped>
  .navbar {
    height: 50px;
    background: #92dfdf;
    box-shadow: 2px 2px 4px grey;
    display: flex;
    align-items: center;
    padding: 0 15px;
  }
  .navbar__btns {
    margin-left: auto;
  }
</style>