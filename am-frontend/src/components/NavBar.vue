<template>
    <b-navbar type="light" variant="dark" id="navbar">
      <b-navbar-brand >
        <router-link to="/" class="rounded-circle p-2 white">
          <b-icon icon="bar-chart-fill" flip-h></b-icon>
        </router-link>
      </b-navbar-brand>

      <b-button variant="light" class="ml-auto">
        <router-link to="/login">Admin</router-link> 
      </b-button>
      <b-button variant="danger" class="ml-2" v-if="isAuth" @click="logout">
        Logout
      </b-button>
    </b-navbar>
</template>

<script>
import { isAuthenticated } from '../router/index'
import axios from 'axios'

export default {
  data(){
    return{
      isAuth: false
    }
  },
  created(){
    this.isAuth = isAuthenticated()
  },
  methods: {
    logout(){
      axios.post('/logout')
      .then(() => {
        localStorage.removeItem('access_token')
        this.$router.push({ path: '/' })
      })
    }
  }
}
</script>

<style scoped>
  #navbar {
    -webkit-box-shadow: 0px -24px 27px 13px rgba(252,252,252,1);
    -moz-box-shadow: 0px -24px 27px 13px rgba(252,252,252,1);
    box-shadow: 0px -24px 27px 13px rgba(252,252,252,1);
  }
</style>