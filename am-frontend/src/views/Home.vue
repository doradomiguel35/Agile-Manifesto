<template>
  <div class="home">
      <div class="hero p-5">
        <div class="text-center hero-txt container ">
          Values and Principles in Agile Software Development
        </div>
      </div>
      <div class="container mt-4">
        <values></values>
      </div>

      <div class="container my-4">
        <principles></principles>
      </div>
  </div>
</template>

<script>
import Values from '../components/Values/Values'
import Principles from '../components/Principles/Principles'

export default {
  name: 'Home',
  components: {
    'values': Values, 
    'principles': Principles,
  },
}
</script>

<style scoped>
  .hero {
    background-image: url('../assets/code.png');
    background-repeat: no-repeat;
  }

  .hero-txt{
    color: #fff;
    font-size: 36px;
  }
</style>