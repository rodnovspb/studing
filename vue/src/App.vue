<template>

  <ul>
    <li v-for="user in users" :key="user.id">
      <template v-if="user.isEdit">
          {{ user.name }} {{ user.salary }} {{ user.age }} <button href="#" @click="edit(user)">Редактировать</button>
      </template>
      <template v-else>
          <input type="text" v-model="user.name">
          <input type="text" v-model="user.salary">
          <input type="text" v-model="user.age">
          <button @click="save(user)">Сохранить</button>
      </template>
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
                isEdit: true,
              },
              {
                id: 2,
                name: 'name2',
                salary: 200,
                age: 40,
                isEdit: true,
              },
              {
                id: 3,
                name: 'name3',
                salary: 300,
                age: 50,
                isEdit: true,
              },
            ],
          }
        },
        methods: {
            save(user) {
              user.isEdit = true
            },
            edit(user) {
              user.isEdit = false
            }
          }}










</script>