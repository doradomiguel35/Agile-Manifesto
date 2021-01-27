<template>
  <div class="row">
    <div class="col-6 mt-2 px-1" v-for="val in values" :key="val.id">
      <b-card bg-variant="light" text-variant="black">
          <p class="">
            {{ val.value }}  
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
      values: []
    }
    
  },
  created(){
    this.getValues()
  },
  methods: {
    getValues(){
      axios.get('/values/')
      .then(res => {
        this.values = res.data
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