<template>

  <ul>
    <li v-for="user in users" :key="user.id">
      {{ user.name }} {{ user.salary }} {{ user.age }} <a href="#" @click="remove(user.id)">удалить</a>
    </li>
  </ul>



</template>

<script>

  export default {
        data(){
          return {
            users: [
              {
                id: 1,
                name: 'name1',
                salary: 100,
                age: 30,
              },
              {
                id: 2,
                name: 'name2',
                salary: 200,
                age: 40,
              },
              {
                id: 3,
                name: 'name3',
                salary: 300,
                age: 50,
              },
            ],
          }
        },
        methods: {
          remove(num){
            this.users = this.users.filter(user=>user.id !== num)
            }
          }}










</script>