<template>
  <h1>Все статьи</h1>

  <ul>
    <li><router-link :to="{ name: 'post', params: {id:1}}">Пост №1</router-link></li>
    <li><router-link :to="{ name: 'post', params: {id:2}}">Пост №2</router-link></li>
    <li><router-link :to="{ name: 'post', params: {id:3}}">Пост №3</router-link></li>
  </ul>

</template>

<script setup>
import {useRoute, useRouter} from "vue-router";

const router = useRouter()
const route = useRoute()




</script>