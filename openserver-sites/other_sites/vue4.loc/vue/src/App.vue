<template>
  <div class="container">
    <form class="pt-3" @submit.prevent="onSubmit">

      <div class="form-group">
        <label for="email">Почта</label>
        <input
            @blur="v$.email.$touch()"
            v-model="email"
            class="form-control"
            :class="{'is-invalid' : v$.email.$errors.length}"
            id="email"
            type="text">
        <div class="invalid-feedback" v-for="error of v$.email.$errors" :key="error.$uid">
          <div class="error-msg">{{ error.$message }}</div>
        </div>
      </div>

      <div class="form-group">
        <label for="password">Пароль</label>
        <input
            @blur="v$.password.$touch()"
            v-model="password"
            class="form-control"
            :class="{'is-invalid' : v$.password.$errors.length}"
            id="password"
            type="password">
        <div class="invalid-feedback" v-for="error of v$.password.$errors" :key="error.$uid">
          <div class="error-msg">{{ error.$message }}</div>
        </div>
      </div>

<!--      <div class="form-group">-->
<!--        <label for="confirmPas">Подтвердите пароль</label>-->
<!--        <input-->
<!--            @blur="v$.confirmPas.$touch()"-->
<!--            v-model="confirmPas"-->
<!--            class="form-control"-->
<!--            :class="{'is-invalid' : v$.confirmPas.$errors.length}"-->
<!--            id="confirmPas"-->
<!--            type="password">-->
<!--        <div class="invalid-feedback" v-for="error of v$.confirmPas.$errors" :key="error.$uid">-->
<!--          <div class="error-msg">{{ error.$message }}</div>-->
<!--        </div>-->
<!--      </div>-->

      <button
          type="submit"
          class="btn btn-success mt-5"
          :disabled="v$.$invalid"
      >Отправить</button>

    </form>
  </div>
</template>

<script>
import { required, email, minLength, sameAs } from '@vuelidate/validators'
import { useVuelidate } from '@vuelidate/core'

export default {
  setup () {
    return { v$: useVuelidate() }
  },
  data(){
    return {
      email: '',
      password: '',
      confirmPas: ''
    }
  },
  methods: {
    onSubmit(){
      this.email = this.password = ''
      
    }
  },
  validations() {
    return {
      email: { required, email, uniqEmail: function (newEmail){
        if(newEmail === '') return true;
          return new Promise((resolve, reject)=>{
            setTimeout(()=>{
              let a = newEmail !== 'test@test.ru'
              resolve(a)
            }, 1000)
          })
        }},
      password: { minLength: minLength(6)},
      // confirmPas: {sameAs: sameAs('password')}
    }
  }
}
</script>