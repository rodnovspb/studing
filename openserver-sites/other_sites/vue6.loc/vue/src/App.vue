<template>
  <div class="container pt-2">
    <div class="form-group">
      <label for="name">Имя</label>
      <input type="text" id="name" class="form-control" v-model.trim="carName">
    </div>

    <div class="form-group">
      <label for="year">Имя</label>
      <input type="text" id="year" class="form-control" v-model.number="carYear">
    </div>

    <button class="btn btn-success m-3" @click="createCar">Создать</button>
    <button class="btn btn-primary m-3" @click="loadCars">Загрузить</button>

    <hr>

    <ul class="list-group">
      <li class="list-group-item" v-for="car in cars" :key="car.id">
        <strong>{{ car.name }} - {{ car.year }}</strong>
      </li>
    </ul>

  </div>
</template>

<script>


export default {
  data(){
    return {
      carName: '',
      carYear: 2018,
      cars: [],
      resource: null
    }
  },
  methods: {
    createCar(){
      const car = {
        name: this.carName,
        year: this.carYear
      }
      // this.$http.post('http://localhost:3000/cars', car)
      //     .then(res => res.json())
      //     .then(res => console.log(res))

      this.resource.save({}, car)
    },
    loadCars(){
      // this.$http.get('http://localhost:3000/cars')
      //     .then(res => res.json())
      //     .then(res => this.cars = res)

      this.resource.get()
          .then(res => res.json())
          .then(res => this.cars = res)
    }
  },
  created() {
    this.resource = this.$resource('cars')
  }
}



</script>


