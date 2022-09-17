<template>
  <div>
    <h1>{{ getDay(num) }}</h1>
  </div>
</template>


<script>
export default {
  data: function() {
    return {
      num: 5
    };
  },
  methods: {
    getDay: function(value) {
      const week = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'];
      return week[value-1]
    }
  }
};
</script>