<script setup>
const props = defineProps({
  cocktail: {
    type: Object,
    required: true
  }
})

</script>

<template>
<div class="root">
  <RouterLink :to="{ name: 'cocktail', params: { id: cocktail.idDrink } }">
    <div :style="`background-image: url(${cocktail.strDrinkThumb})`" class="pic"></div>
  <div class="name">{{ cocktail.strDrink }}</div>
  </RouterLink>
</div>
</template>

<style scoped lang="sass">
@import "../assets/styles/main.sass"

.root
  width: calc((100% - 76px)/3)
  margin-right: 38px
  padding-bottom: 20px

  &:nth-child(3n + 3)
    margin-right: 0

.pic
  width: 120px
  height: 120px
  background-repeat: no-repeat
  background-position: 50% 50%
  background-size: 100%

.name
  width: 100%
  white-space: nowrap
  overflow: hidden
  text-overflow: ellipsis
  padding-top: 15px
  letter-spacing: 0.1em
  max-width: 120px

</style>