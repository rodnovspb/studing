<template>

<!--  получилось-->
  <MyComponent v-for="user of users" :key="user.id" :id="user.id" :name="user.name" :surn="user.surn" :remove="remove"/>


</template>

<script>
  import MyComponent from "@/components/MyComponent";

  export default {
    components: {
      MyComponent
    },
    data(){
      return {
        users: [
          {
            id: 1,
            name: 'name1',
            surn: 'surn1'
          },
          {
            id: 2,
            name: 'name2',
            surn: 'surn2'
          },
          {
            id: 3,
            name: 'name3',
            surn: 'surn3'
          },
        ],
      }
    },
    methods: {
      remove(id){
        this.users = this.users.filter(user=>user.id != id)
      }
    }
  }



</script>