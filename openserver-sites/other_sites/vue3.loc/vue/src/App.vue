<template>
  <div>
    <app-onoff v-model="switched"></app-onoff>

    <div>
      <h3 v-if="switched">Показать</h3>
      <h3 v-else>Скрыть</h3>
    </div>
  </div>
</template>

<script>

import Onoff from "@/Onoff.vue";

export default {
  data(){
    return {
      switched: false
    }
  },
  components: {
    'app-onoff': Onoff
  }

}

</script>

<style scoped>

</style>


