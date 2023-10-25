<script setup>
import AppLayout from "@/components/AppLayout.vue";
import { useRoute, useRouter } from "vue-router";
import {computed, ref} from "vue";
import { COCKTAILS_BY_ID } from "@/constants/api"
import axios from "axios";

const route = useRoute()
const router = useRouter()

const cocktail = ref(null)
const cocktailId = computed(()=> route.path.split('/').pop())

async function getCocktail(){
  const data = await axios.get(`${COCKTAILS_BY_ID}${cocktailId.value}`)
  cocktail.value = data?.data?.drinks[0]
}

function goBack(){
  router.go(-1)
}

const ingredients = computed(() => {
  const ingredients = []

  for(let i = 1; i <= 15; i++){
    if(!cocktail.value[`strIngredient${i}`]){
      break
    }
    const ingredient = {}
    ingredient.name = cocktail.value[`strIngredient${i}`]
    ingredient.measure = cocktail.value[`strMeasure${i}`]
    ingredients.push(ingredient)
  }
  return ingredients
})

getCocktail()
</script>

<template>
  <div v-if="cocktail" class="wrap">
  <AppLayout :imgUrl="cocktail.strDrinkThumb" :backFunc="goBack">
    <div class="wrapper">
      <div class="info">
        <div class="title">{{ cocktail.strDrink }}</div>
        <div class="line"></div>
        <div class="list">
          <div v-for="(item, key) in ingredients" :key="key" class="list-item">
            {{ item.name }}
            <template v-if="item.measure">| {{ item.measure }}</template>
          </div>
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


</style>
