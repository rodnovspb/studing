<script setup>
import { cells } from './store.js'

import Cell from "@/components/Cell.vue";

const cols = cells.map((_, i) => String.fromCharCode(65 + i))



</script>

<template>

  <table>
    <thead>
      <tr>
        <th></th>
        <th v-for="col in cols">{{ col }}</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="i in cells[0].length">
        <th>{{ i - 1 }}</th>
        <td v-for="(c, j) in cols">
          <Cell :r="i - 1" :c="j"></Cell>
        </td>
      </tr>
    </tbody>
  </table>


</template>

<style>
table {
  border-collapse: collapse;
  width: 100%;
  table-layout: fixed;
}

th {
  background-color: #eee;
}

tr:first-of-type th {
  width: 200px;
}

tr:first-of-type th:first-of-type {
  width: 45px;
}

td {
  border: 1px solid #ccc;
  height: 1.5em;
  overflow: hidden;
}
</style>