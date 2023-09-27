<template>
  <form @submit.prevent="onSubmit">
    <textarea v-model="body" required placeholder="Напечатайте здесь" />
    <br>
    <button class="btnTweet" type="submit">Отправить</button>
  </form>
</template>

<script>
import { ref } from 'vue'
export default {
  emits: ['onSubmit'],

  setup(props, {emit}){
    const body =  ref('')

    const onSubmit = () => {
      emit('onSubmit', {
        id: Math.round(Math.random()*30),
        avatar: `https://api.dicebear.com/7.x/croodles/svg?seed=${Date.now()}`,
        body: body.value,
        likes: 0,
        date: new Date(Date.now()).toLocaleString()
      })
      body.value = ''
    }
    return {body, onSubmit}
  }
}

// export default {
//   data(){
//     return {
//       body: ''
//     }
//   },
//   methods: {
//     onSubmit(e){
//       this.$emit('onSubmit', {
//         id: Math.round(Math.random()*30),
//         avatar: `https://api.dicebear.com/7.x/croodles/svg?seed=${Date.now()}`,
//         body: this.body,
//         likes: 0,
//         date: new Date(Date.now()).toLocaleString()
//       })
//       this.body = ''
//     }
//   }
// }
</script>