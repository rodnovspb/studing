<template>
 <div>
    <ul>
      <transition-group name="list">
      <li v-for="item in arr" :key="item.id">
        <div class="list__item">
          {{ item.text }}
          <button @click="deleteItem(item.id)">Удалить</button>
        </div>
      </li>
      </transition-group>
    </ul>
 </div>
</template>

<script>
 export default {

   methods:{
     deleteItem(id){
       this.arr = this.arr.filter(elem => elem.id !== id)
     }
   },
   data(){
     return {
       arr: [
         {
           id: 1,
           text: 1,
         },
         {
           id: 2,
           text: 2,
         },
         {
           id: 3,
           text: 3,
         }
       ]
     }
   }
 };
</script>

<style scoped>
  .list__item {
    display: flex;
    gap: 30px;
    padding-top: 10px;
    padding-bottom: 10px;
  }

  .list-enter-active,
  .list-leave-active {
    transition: all 1s ease;
  }
  .list-enter-from,
  .list-leave-to {
    opacity: 0;
    transform: translateX(50px);
  }
</style>