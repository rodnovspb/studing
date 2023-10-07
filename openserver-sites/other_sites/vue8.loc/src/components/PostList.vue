<template>
  <div v-if="posts.length > 0">
    <h3>Список статей</h3>
    <post-item
        v-for="(post, key) in posts"
        :key="post.id"
        :post="post"
        @remove="$emit('remove', post)"
    />
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

</style>