<script setup>
import { computed, onMounted, provide, reactive, ref, watch } from 'vue'
import axios from 'axios'
import Header from '@/components/Header.vue'
import CardList from '@/components/CardList.vue'
import Drawer from '@/components/Drawer.vue'

const items = ref([])
const cart = ref([])
const isCreatingOrder = ref(false)

const drawerOpen = ref(false)

const totalPrice = computed(() => cart.value.reduce((acc, item) => acc + item.price, 0))

const vatPrice = computed(() => Math.round((totalPrice.value * 5) / 100))

const openDrawer = () => {
  drawerOpen.value = true
}

const cartIsEmpty = computed(() => cart.value.length === 0)

const cartButtonDisabled = computed(() => isCreatingOrder.value || cartIsEmpty.value)

const closeDrawer = () => {
  drawerOpen.value = false
}

const filters = reactive({
  sortBy: 'title',
  searchQuery: ''
})

const addToCart = (item) => {
  cart.value.push(item)
  item.isAdded = true
}

const removeFromCart = (item) => {
  cart.value.splice(
    cart.value.indexOf(item), 1
  )
  item.isAdded = false
}

const createOrder = async () => {
  try {
    isCreatingOrder.value = true
    const {data} = await axios.post('https://d94eb65ecac06b79.mokky.dev/orders', {
      items: cart.value,
      totalPrice: totalPrice.value
    })
    cart.value = []
    // return data
  } catch (e){
    console.log(e)
  } finally {
    isCreatingOrder.value = false
  }
}

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

const onChangeSearchInput = (event) => {
  filters.searchQuery = event.target.value
}

const fetchFavorites = async () => {
  try {
    const {data : favourites} = await axios.get(`https://d94eb65ecac06b79.mokky.dev/favorites`)
    items.value = items.value.map(item => {
      const favourite = favourites.find(favourite => favourite.parentId === item.id)
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

const addToFavorite = async (item) => {
  try {

    if(!item.isFavourite){
      const obj = {
        parentId: item.id
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

watch(filters, fetchItems)

watch(cart, () => {
  items.value = items.value.map((item) => ({
    ...item,
    isAdded: false
  }))
})

watch(cart, () => {
  localStorage.setItem('cart', JSON.stringify(cart.value))
}, { deep: true })

provide('cart', {closeDrawer, openDrawer, cart, addToCart, removeFromCart})


</script>


<template>
  <Drawer v-if="drawerOpen" :total-price="totalPrice" :vat-price="vatPrice" @create-order="createOrder" :button-disabled="cartButtonDisabled"/>
  <div class="w-4/5 m-auto bg-white rounded-xl shadow-xl mt-14">
    <Header :total-price="totalPrice" @open-drawer='openDrawer'/>

    <div class="p-10">
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
        <CardList :items="items" @add-to-favourite="addToFavorite" @add-to-cart="onClickAddPlus" />
      </div>

    </div>
  </div>
</template>


<style scoped>

</style>

