<template>
  <li class="tweet__wrapper">
    <div class="tweet">
      <div class="avatar">
        <img :src="item.avatar">
      </div>
      <div class="tweet-content">
        <div class="tweet-header">
          <span>{{ item.date }}</span>
        </div>
        <div>{{ item.body }}</div>
        <div class="like">
          <div class="icon"></div>
          <span>{{ item.likes }}</span>
        </div>
      </div>
    </div>
  </li>
</template>


<script>
export default {
  props: {
    item: {
      type: Object,
      required: true,
    }
  }
}
</script>