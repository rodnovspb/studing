<script setup>
import { ref, shallowReactive, toRaw, watch } from 'vue'

const adjusting = ref(false)
const selected = ref()
const circles = ref([])
const index = ref(0)
const history = shallowReactive([[]])

function onClick({ clientX: x, clientY: y }){
  if(adjusting.value){
    adjusting.value = false
    selected.value = null
    return
  }

  selected.value = [...circles.value].find(({ cx, cy, r }) => {
    const dx = cx - x
    const dy = cy - y
    return Math.sqrt(dx * dx + dy * dy) <= r
  })


  if (!selected.value) {
    circles.value.push({
      cx: x,
      cy: y,
      r: 50
    })
    push()
  }

}

function push() {
  history.length = ++index.value
  history.push(clone(circles.value))
}

function clone(circles) {
  return circles.map((c) => ({ ...c }))
}

function adjust(circle){
  adjusting.value = true
  selected.value = circle
}

function undo() {
  circles.value = clone(history[--index.value])
}

function redo() {
  circles.value = clone(history[++index.value])
}


</script>

<template>
  <svg @click="onClick">
    <foreignObject width="100%" height="200" x="0" y="40%">
      <p class="tip">Щелкните на холст, чтобы нарисовать окружность. Щелкните на окружность, чтобы выделить ее.
        Щелкните правой кнопкой мыши на холст, чтобы изменить радиус выделенной окружности.</p>
    </foreignObject>
    <circle v-for="circle in circles"
            :cx="circle.cx"
            :cy="circle.cy"
            :r="circle.r"
            @click="selected = circle"
            @contextmenu.prevent="adjust(circle)"
            :fill="circle === selected ? '#ccc' : '#fff'"
    ></circle>
  </svg>
  <div class="controls">
    <button @click="undo" :disabled="index < 0">Отменить</button>
    <button @click="redo" :disabled="index >= history.length - 1">Повторить</button>
  </div>
  <div class="dialog" v-if="adjusting" @click.stop>
    <p>Настроить радиус</p>
    <input type="range" min="0" max="300" v-model="selected.r">
  </div>
</template>

<style>
  body {
    margin: 0;
    overflow: hidden;
  }

  svg {
    width: 100vw;
    height: 100vh;
    background-color: #eee;
  }

  circle {
    stroke: #000;
  }

  .controls {
    position: fixed;
    top: 10px;
    left: 0;
    right: 0;
    text-align: center;
  }

  .controls button + button {
    margin-left: 10px;
  }

  .dialog {
    position: fixed;
    top: calc(50% - 50px);
    left: calc(50% - 175px);
    width: 350px;
    height: 100px;
    text-align: center;
    padding: 10px;
    background: #fff;
    box-sizing: border-box;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.25);
  }

  .dialog input {
    width: 200px;
    margin: 0 auto;
  }

  .tip {
    text-align: center;
    color: #bbb;
    padding: 0 50px;
  }
</style>