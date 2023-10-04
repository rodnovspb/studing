<template>
  <div>
    <h2>Инпуты</h2>
    <input type="text" v-model.lazy="name">
    <p>{{ name }}</p>
  </div>
</template>

<script>



export default {
  data(){
    return {
      name: ''
    }
  }
}

</script>




