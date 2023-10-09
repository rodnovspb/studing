<template>
  <div v-if="posts.length > 0">
    <h3>Список статей</h3>
    <transition-group name="post-list">
      <post-item
          v-for="(post, key) in posts"
          :key="post.id"
          :post="post"
          @remove="$emit('remove', post)"
      />
    </transition-group>

  </div>
  <h2 v-else style="color: red">Статей нет</h2>
</template>

<script>
 import PostItem from "@/components/PostItem.vue";

 export default {
    props: {
      posts: {
        type: Array,
        required: true
      }
    },
   components: {
      PostItem
   }
 };
</script>

<style scoped>
  .post-list-item {
    display: inline-block;
    margin-right: 10px;
  }
  .post-list-enter-active,
  .post-list-leave-active {
    transition: all .4s ease;
  }
  .post-list-enter-from,
  .post-list-leave-to {
    opacity: 0;
    transform: translateX(130px);
  }
</style>