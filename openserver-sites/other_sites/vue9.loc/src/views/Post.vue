<template>
  <h1>Статья № {{ $route.params.id }}</h1>
  <div><button @click="showPostId">Показать номер поста</button></div>

</template>

<script setup>
import {useRoute, useRouter} from "vue-router";

const router = useRouter()
const route = useRoute()


const showPostId = ()=>{
  console.log(route)
  console.log(route.name)

}
</script>