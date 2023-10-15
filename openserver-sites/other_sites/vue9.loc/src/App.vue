<template>

 <div>
   <app-list></app-list>
 </div>


</template>

<script>


  import List from "@/components/List.vue";

  export default {
    data(){
      return {

      }
    },
    methods: {

    },

    components: {
      'app-list': List
    },

  }

</script>

<style>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 5s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

</style>
<script setup>
</script>