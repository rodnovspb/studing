<template>
  <div class="post">
    <div>
      {{ post.id }} <strong>{{ post.title }}</strong> {{ post.body }}
    </div>
    <div>Количество лайков: {{ $store.getters.doubleLikes }}</div>
    <div class="post_btns">
      <my-button @click="$router.push(`/posts/${post.id}`)">Открыть</my-button>
      <my-button @click="$emit('remove', post)">Удалить</my-button>
    </div>
  </div>
</template>

<script>


export default {
  props: {
    post: {
      type: Object,
      required: true
    }
  }
}

</script>

<style scoped>
  .post {
    padding: 15px;
    margin-top: 15px;
    border: 2px solid teal;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .post_btns {
    display: flex;
    gap: 10px;
  }
</style>