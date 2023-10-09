<template>
  <div class="post">
    <div>
      {{ post.id }} <strong>{{ post.title }}</strong> {{ post.body }}
    </div>
    <div class="post_btns">
      <my-button @click="$emit('remove', post)">Удалить</my-button>
    </div>
  </div>
</template>

<script>
import MyButton from "@/components/UI/MyButton.vue";

export default {
  components: {MyButton},
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
</style>