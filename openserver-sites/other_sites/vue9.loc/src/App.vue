<template>
  <div>
    <div v-if="flag">Lorem ipsum dolor sit amet.</div>
     <app-button v-model="flag">
       <template #header>
        <h1>Здесь мог быть заголовок страницы</h1>
      </template>
    </app-button>
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

    provide() {
      return {
        num: this.flag
      }
    }

  }

</script>

<style>

</style>
<script setup>
</script>