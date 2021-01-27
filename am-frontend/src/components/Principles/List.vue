<template>
  <div class="row">
    <div class="col-6 mt-2 px-1" v-for="pri in principles" :key="pri.id">
      <b-card text-variant="black" class="h-100">
        <p >
          {{ pri.principle }}  
        </p>
      </b-card>  
    </div>           
  </div>
</template>

<script>
import axios from 'axios'
export default {
  data(){
    return{
      principles: []
    }
    
  },
  created(){
    this.getPrinciples()
  },
  methods: {
    getPrinciples(){
      axios.get('/principles/')
      .then(res => {
        this.principles = res.data
      })
    }
  }
}
</script>

<style scoped>
  p {
    color: #000000 !important;
  }
</style>