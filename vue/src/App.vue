<template>
  <MyEmployee :arr="[1,2,3,4,5,6]"/>
</template>

<script>
  import MyEmployee from "./components/MyEmployee.vue";

  export default {
    components: {
      MyEmployee
    },
  }



</script>