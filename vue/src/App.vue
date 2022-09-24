<template>

  <ul>
    <li v-for="elem of hrefs" :key="elem"><a href="{{ elem.href }}">{{ elem.text }}</a></li>
  </ul>




</template>


<script>

  export default {
    data(){
      return {
        hrefs: [
          {href: `https://ya.ru/`, text: 'text1'},
          {href: '2.html', text: 'text2'},
          {href: '3.html', text: 'text3'},
        ],
      }
    },
    methods: {

    }
  }







</script>