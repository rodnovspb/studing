<template>
  {{ name }}
  {{ surname }}
  {{ age }}

</template>

<script>
  export default {
    props: ['name', 'surname', 'age'],
    data(){
      return {

      }
    }
  }


</script>