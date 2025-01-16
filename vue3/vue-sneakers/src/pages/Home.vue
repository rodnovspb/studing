<script setup>
import CardList from '@/components/CardList.vue'
import axios from 'axios'
import debounce from 'lodash.debounce'
import { inject, onMounted, reactive, ref, watch } from 'vue'

const { addToCart, removeFromCart, cart } = inject('cart')

const items = ref([])

const filters = reactive({
  sortBy: 'title',
  searchQuery: ''
})

const onClickAddPlus = (item) => {
  if(!item.isAdded){
    addToCart(item)
  } else {
    removeFromCart(item)
  }

}

const onChangeSelect = (event) => {
  filters.sortBy = event.target.value
}

const onChangeSearchInput =  debounce((event) => {
  filters.searchQuery = event.target.value
}, 500)

const addToFavorite = async (item) => {
  try {

    if(!item.isFavourite){
      const obj = {
        item_id: item.id,
      }
      item.isFavourite = true
      const {data} = await axios.post(`https://d94eb65ecac06b79.mokky.dev/favorites`, obj)
      item.favouriteId = data.id
    } else {
      item.isFavourite = false
      await axios.delete(`https://d94eb65ecac06b79.mokky.dev/favorites/${item.favouriteId}`)
      item.favouriteId = null
    }

  } catch (e){
    console.log(e)
  }

}

const fetchFavorites = async () => {
  try {
    const {data : favourites} = await axios.get(`https://d94eb65ecac06b79.mokky.dev/favorites`)
    items.value = items.value.map(item => {
      const favourite = favourites.find(favourite => favourite.item_id === item.id)
      if(!favourite){
        return item
      }
      return {
        ...item,
        isFavourite: true,
        favouriteId: favourite.id
      }

    })
  } catch (e){
    console.log(e)
  }
}

const fetchItems = async () => {
  try {
    const params = {
      sortBy: filters.sortBy,
    }

    if(filters.searchQuery){
      params.title = `*${filters.searchQuery}`
    }

    const {data} = await axios.get(`https://d94eb65ecac06b79.mokky.dev/items`, {
      params
    })
    items.value = data.map(obj => ({
      ...obj,
      isFavourite: false,
      isAdded: false,
      favoriteId: null
    }));
  } catch (e){
    console.log(e)
  }
}

watch(filters, fetchItems)

watch(cart, () => {
  items.value = items.value.map((item) => ({
    ...item,
    isAdded: false
  }))
})

onMounted(async () => {
  const localCart = localStorage.getItem('cart');
  cart.value =  localCart ? JSON.parse(localCart) : []

  await fetchItems()
  await fetchFavorites()

  items.value = items.value.map((item) => ({
    ...item,
    isAdded: cart.value.some((cartItem) => cartItem.id === item.id)
  }))

})


</script>

<template>
  <div class="flex justify-between items-center">
    <h2 class="text-3xl font-bold mb-8">Все кроссовки</h2>

    <div class="flex gap-4">
      <select @change="onChangeSelect" class="py-2 px-3 border rounded-md outline-none">
        <option value="name">По названию</option>
        <option value="price">По цене (дешевле)</option>
        <option value="-price">По цене (дороже)</option>
      </select>

      <div class="relative">
        <img class="absolute left-4 top-2.5" src="/search.svg" alt="">
        <input @input="onChangeSearchInput" class="border rounded-md py-1.5 pl-12 pr-4 outline-none focus:border-gray-400" type="text" placeholder="Поиск">
      </div>
    </div>
  </div>

  <div class="mt-10">
    <CardList :items="items" @add-to-favourite="addToFavorite" @add-to-cart="onClickAddPlus" :isFavorites="true"/>
  </div>
</template>

<style scoped>

</style>
