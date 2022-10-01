<template>


  <MyComponent :funcMin="funcMin" :funcPlus="funcPlus"/>


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
      funcMin(){
        console.log('-')
      },
      funcPlus(){
        console.log('+')
      }
    }
  }



</script>