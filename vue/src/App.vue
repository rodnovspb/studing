<template>


  <MyComponent :func="func"/>


</template>

<script>
  import MyComponent from "@/components/MyComponent";

  export default {
    components: {
      MyComponent
    },
    data(){
      return {

      }
    },
    methods: {
      func(){
        console.log('!!!')
      }
    }
  }



</script>