<template>

  <div>
    <div id="div" :class="{'shake': flag}" style="width: 180px; height: 180px; border: 2px #00d084 solid; background-color: #00d084"></div>

    <button @click="flag = !flag">Кнопка</button>


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
.shake {
  animation: bounceInDown 1s cubic-bezier(0.36, 0.07, 0.19, 0.97) both;
  transform: translate3d(0, 0, 0);
  backface-visibility: hidden;
  perspective: 1000px;
}

@keyframes bounceInDown {
  from,
  60%,
  75%,
  90%,
  to {
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  0% {
    opacity: 0;
    transform: translate3d(0, -3000px, 0) scaleY(3);
  }

  60% {
    opacity: 1;
    transform: translate3d(0, 25px, 0) scaleY(0.9);
  }

  75% {
    transform: translate3d(0, -10px, 0) scaleY(0.95);
  }

  90% {
    transform: translate3d(0, 5px, 0) scaleY(0.985);
  }

  to {
    transform: translate3d(0, 0, 0);
  }
}

</style>
<script setup>
</script>