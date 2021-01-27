<template>
  <div class="container mt-5 p-5 col-md-6 col-sm-12">
    <b-card bg-variant="light">
      <b-form >
        <b-form-input
          id="email"
          type="email"
          placeholder="Enter email"
          v-model="form.email"
          required
        ></b-form-input>

        <b-form-input
            id="password"
            type="password"
            placeholder="Enter password"
            required
            v-model="form.password"
            class="mt-3"
        ></b-form-input>

        <div class="mt-4">
          <b-button type="submit" variant="primary" @click="login">Submit</b-button>
        </div>
      </b-form>
    </b-card>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  data(){
    return {
      form: {
        email: null,
        password: null
      }
    }
  },
  methods: {
    login(e){
      e.preventDefault()

      axios.post('/login', this.form)
      .then(res => {
        const token = res.data.token
        localStorage.setItem('access_token', token)
        this.$router.push({ path:'/admin' })
        
      })
      .catch(err => {
        console.log(err.data)
      })
    }
  }
}
</script>

<style>

</style>