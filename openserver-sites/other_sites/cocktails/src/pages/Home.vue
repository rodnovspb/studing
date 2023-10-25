<script setup>
import AppLayout from "@/components/AppLayout.vue";
import {useRootStore} from "@/stores/root";
import {storeToRefs} from "pinia";
import CocktailThumb from "@/components/CocktailThumb.vue";

const rootStore = useRootStore()
rootStore.getIngredients()

const {ingredients, cocktails, ingredient} = storeToRefs(rootStore)

function getCocktails(){
  rootStore.getCocktails(rootStore.ingredient)
}

function removeIngredient(){
  rootStore.setIngredient(null)
}

</script>

<template>
<AppLayout imgUrl="/src/assets/img/bg-1.jpg" :back-func="removeIngredient" :is-back-button-visible="!!ingredient">
  <div class="wrapper">
    <div v-if="cocktails.length === 0 || ingredient === null" class="info">
      <div class="title">Choose your drink</div>
      <div class="line"></div>
      <div class="select-wrapper">
        <el-select v-model="rootStore.ingredient"
                   placeholder="Choose main ingredient"
                   size="large"
                   class="select"
                   @change="getCocktails"
                   filterable
                   allow-create
                  >
          <el-option
              v-for="item in ingredients"
              :key="item.strIngredient1"
              :label="item.strIngredient1"
              :value="item.strIngredient1"
          />
        </el-select>
      </div>
      <div class="text">Try our delicious cocktail recipes for every occasion. Find delicious cocktail recipes by ingredient through our cocktail generator.</div>
      <img src="/src/assets/img/cocktails.png" alt="cocktails" class="img">
    </div>
    <div v-else class="info">
      <div class="title">COCKTAILS WITH {{ ingredient }} </div>
      <div class="line"></div>
      <div class="cocktails">
        <CocktailThumb v-for="cocktail in cocktails" :key="cocktail.idDrink" :cocktail="cocktail"/>
      </div>
    </div>
  </div>
</AppLayout>


</template>

<style scoped lang="sass">
@import "../assets/styles/main.sass"

.select-wrapper
  padding-top: 50px

.select
  width: 220px

.text
  padding-top: 50px
  line-height: 36px
  letter-spacing: 0.1em
  color: $textMuted
  max-width: 516px
  margin: 0 auto

.img
  margin-top: 60px

.cocktails
  display: flex
  flex-wrap: wrap
  align-items: center
  margin: 60px auto 0
  max-height: 400px
  overflow-y: auto

</style>
