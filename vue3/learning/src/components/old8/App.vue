<script setup>
  import { ref, computed, watchEffect } from 'vue'

  function dateToString(date) {
    return (
        date.getFullYear() +
        '-' +
        pad(date.getMonth() + 1) +
        '-' +
        pad(date.getDate())
    )
  }

  const flightType = ref('one-way flight')
  const departureDate = ref(dateToString(new Date()))
  const returnDate = ref(departureDate.value)

  const isReturn = computed(() => flightType.value === 'return flight')

  function pad(num, str = String(num)) {
    return str.length < 2 ? `0${str}` : str;
  }

  const stringToDate = (date) => {
    let [y, m, d] = date.value.split('-')
    return new Date(+y, +m - 1, +d)
  }

  const canBook = computed(() => {
    return !isReturn.value || stringToDate(returnDate) > stringToDate(departureDate)

  })

  const book = () => {
    alert(isReturn.value ? `Вы забронировали перелет туда ${departureDate.value} и обратно ${returnDate.value}` : `Вы забронировали перелет ${departureDate.value}`)
  }


</script>

<template>
  <div style="display: inline-flex; flex-direction: column">
    <select v-model="flightType">
      <option value="one-way flight">Перелет в одну сторону</option>
      <option value="return flight">Обратный перелет</option>
    </select>
    <input type="date" v-model="departureDate">
    <input type="date" v-model="returnDate" :disabled="!isReturn">
    <button :disabled="!canBook" @click="book">Заказать</button>
  </div>
  <p v-if="!canBook">Обратная дата должна быть после даты отправления</p>

</template>

<style scoped>
select,
input,
button {
  display: block;
  margin: 0.5em 0;
  font-size: 15px;
}

input[disabled] {
  color: #999;
}

p {
  color: red;
}
</style>