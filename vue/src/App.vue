<template>
  <input type="text" v-model="text">
  <button @click="cut">Разбить</button>
  <p>{{ surname }}</p>
  <p>{{ name }}</p>
  <p>{{ patronymic }}</p>

</template>

<script>

  export default {
        data(){
          return {
            surname: '',
            name: '',
            patronymic: '',
            text: ''
          }
        },
        methods: {
          cut(){
            let arr = this.text.match(/\p{L}+/gui);
            this.surname = arr[0]
            this.name = arr[1]
            this.patronymic = arr[2]
          }
        }
      }


console.log('Роднов Ёенисё Анатольевич'.match(/[А-яЁё]+/ug))





</script>