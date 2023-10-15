<template>

  <div>
    <button @click="flag = !flag">Кнопка</button>
    <transition name="fade">
      <div v-if="flag" id="div" style="width: 180px; height: 180px; border: 2px #00d084 solid; background-color: #00d084"></div>
    </transition>




  </div>

</template>

<script>


  import Button from "@/components/Button.vue";

  export default {
    data(){
      return {
        flag: true
      }
    },
    methods: {

    },

    components: {
      'AppButton': Button
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