<script setup>
import AppLayout from "@/components/AppLayout.vue";
import {computed, ref} from "vue";
import {COCKTAIL_RANDOM, INGREDIENT_PIC} from "@/constants/api";
import axios from "axios";
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';

const cocktail = ref(null)

async function getCocktail(){
  const data = await axios.get(`${COCKTAIL_RANDOM}`)
  cocktail.value = data?.data?.drinks[0]
}

const ingredients = computed(() => {
  const ingredients = []

  for(let i = 1; i <= 15; i++){
    if(!cocktail.value[`strIngredient${i}`]){
      break
    }
    const ingredient = cocktail.value[`strIngredient${i}`]

    ingredients.push(ingredient)
  }
  return ingredients
})

getCocktail()
</script>

<template>
  <div v-if="cocktail" class="wrap">
  <AppLayout :imgUrl="cocktail.strDrinkThumb">
    <div class="wrapper">
      <div class="info">
        <div class="title">{{ cocktail.strDrink }}</div>
        <div class="line"></div>
        <div class="slider">
          <swiper
              class="swiper"
              :slides-per-view="3"
              :space-between="50">
            <swiper-slide v-for="(ingredient, key) in ingredients" :key="key">
              <img :src="`${INGREDIENT_PIC}${ingredient}-Small.png`">
              <div class="name">{{ ingredient }}</div>
            </swiper-slide>
        </swiper>
        </div>
        <div class="instructions">
          {{ cocktail.strInstructions }}
        </div>
      </div>
    </div>
  </AppLayout>
  </div>
</template>

<style scoped lang="sass">
@import "../assets/styles/main.sass"

.slider
  padding: 50px 0

.swiper
  width: 586px

.name
  padding-top: 20px

</style>
