<template>

  <p v-for="elem in users" :key="elem.id">{{ elem.name }}</p>


</template>


<script>

  export default {
    data(){
      return {
        users: [
          {
            id: 1,
            name: 'name1',
            surn: 'surn1',
          },
          {
            id: 2,
            name: 'name2',
            surn: 'surn2',
          },
          {
            id: 3,
            name: 'name3',
            surn: 'surn3',
          },
        ],
      }
    },
    methods: {

    }
  }







</script>