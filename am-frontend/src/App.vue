<template>
  <div id="app">
    <nav-bar></nav-bar>
    <router-view/>
  </div>
</template>
<script>
import NavBar from './components/NavBar'
export default {
  components: {
    'nav-bar': NavBar 
  }
}
</script>

<style>
@font-face {
  font-family: 'Rubik-Regular';
  src:url('./assets/fonts/Rubik-Regular.ttf');
}

@font-face {
  font-family: 'Rubik-Medium';
  src: url('./assets/fonts/Rubik-Medium.ttf');
}

@font-face {
  font-family: 'Rubik-Bold';
  src: url('./assets/fonts/Rubik-Bold.ttf');
}

#app {
  font-family: 'Rubik-Regular';

  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

a {
  text-decoration: none !important;
  color: #2c3e50;
}

.medium-txt{
  font-family: 'Rubik-Medium';
}

.bold-txt{
  font-family: 'Rubik-Bold';
}

.white{
  background-color: #ffff;
}

.card {
  
}
</style>
