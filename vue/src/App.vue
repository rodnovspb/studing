<template>

  <div v-for="elem in users" :key="elem">
    <p>{{ elem.name }} {{ elem.surn }}</p>
  </div>




</template>


<script>

  export default {
    data(){
      return {
        users: [
          {
            name: 'name1',
            surn: 'surn1',
          },
          {
            name: 'name2',
            surn: 'surn2',
          },
          {
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