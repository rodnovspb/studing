<template>
  <MyEmployee :a="name" :b="surname" :c="age"/>
</template>

<script>
  import MyEmployee from "./components/MyEmployee.vue";

  export default {
    components: {
      MyEmployee
    },
    data(){
      return {
        name: 'Денис',
        surname: 'Роднов',
        age: 35
      }

    }
  }



</script>