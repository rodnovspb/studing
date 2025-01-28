<script setup>
import UButton from "@/components/UButton.vue";

import axios from 'axios'
import { ref, reactive, computed } from 'vue';


const review = reactive({
  author: '',
  star: 2,
  text: '',
  photo: null,
  isRecommended: 'Не советую'
})

const stars = [1, 2, 3, 4, 5]


const submit = async () => {
  try {
    let res = await axios.post('/api/review', review, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    })
    console.log(res)
  } catch (e) {
    console.log(e)
  } finally {
    console.log('Конец')
  }

}




</script>

<template>
  <form class="container pt-5 pb-5" @submit.prevent = "submit">

    <Uinput v-model="review.author" placeholder="Как вас зовут?"/>

    <Uinput type="textarea" v-model="review.text" placeholder="Что понравилось?"/>

    <URadio v-model="review.star" :list="stars" name="estimation" />

    <UFile v-model="review.photo" label="Фото"/>

    <URadio v-model="review.isRecommended" :list="['Не советую', 'Советую']" name="recommend" />

    <UButton>Отправить</UButton>

  </form>
</template>

<style scoped>

</style>