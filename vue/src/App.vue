<template>


  <MyComponent v-for="user of users" :id="user.id"  :name="user.name" :surn="user.surn" :change="change" :key="user.id"/>


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
      change(id, name, surn){
        this.users = this.users.map((user)=>{
          if(user.id == id){
            user.name = name
            user.surn = surn
          }
        })
      }
    }
  }



</script>