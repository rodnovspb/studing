<template>
  <div class="container">
    <form class="pt-3">
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
    </form>
  </div>
</template>

<script>
import { required, email } from '@vuelidate/validators'
import { useVuelidate } from '@vuelidate/core'

export default {
  setup () {
    return { v$: useVuelidate() }
  },
  data(){
    return {
      email: ''
    }
  },
  validations() {
    return {
      email: {required, email}
    }
  }
}
</script>