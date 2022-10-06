<template>


<UserForm  :add="add"/>

</template>

<script>
  import UserForm from "@/components/UserForm";

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
      add(name, surn){
        let id = this.users.length
        this.users.push({
          id,
          name,
          surn
        })
      }
    }
  }



</script>