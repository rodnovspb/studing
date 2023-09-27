<template>
  <select v-model="sortBy">
    <option value="date">По дате</option>
    <option value="likes">По лайкам</option>
  </select>
  <p>{{ sortBy }}</p>
  <ul class="tweets_wrapper">
    <Item v-for="item in sorteredItems" :key="item.id" :item="item"/>
  </ul>
</template>

<script>
  import { ref, computed } from 'vue'
  import Item from "@/components/Item.vue";

  export default {
    components: {Item},
    props: {
      items: {
        type: Array,
        required: true,
      }
    },
    setup({items}){
      const sortBy = ref('date')

      const sorteredItems = computed(()=>{
        return items.items.sort((a,b) => {
          if(a[sortBy.value] > b[sortBy.value]) return 1
          if(a[sortBy.value] < b[sortBy.value]) return -1
        })
      })

      return {sortBy, sorteredItems}
    }
  };
</script>
