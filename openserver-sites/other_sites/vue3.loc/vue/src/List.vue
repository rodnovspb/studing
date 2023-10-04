<template>
  <div>
    <h1>Список</h1>
    <input type="text" v-model="searchName">
    <ul>
      <li v-for="name in filteredNames">{{ name }}</li>
    </ul>
  </div>
</template>

<script>
  import ListMixin from "@/listMixin";
  export default {
    mixins: [ListMixin]
  }
</script>