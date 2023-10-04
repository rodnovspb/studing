<template>
  <div>
    <button
        class="on"
        :class="{'active': value}"
        @click="onChange(true)"
    >Вкл</button>
    <button
        class="off"
        :class="{'active': !value}"
        @click="onChange(false)"
    >Выкл</button>
  </div>
</template>


<script>
export default {
  props: ['value'],
  methods: {
    onChange(newValue){
      this.$emit('input', newValue)
    }
  }
}

</script>

<style>

  button:active {
    box-shadow: 0 0 10px silver;
  }

  .on.active {
    background-color: green;
    color: aliceblue;
  }
  .off.active {
    background-color: blue;
    color: aliceblue;
  }
</style>