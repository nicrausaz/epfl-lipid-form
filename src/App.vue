<template>
  <div id="app">
    <MainForm></MainForm>
  </div>
</template>

<script>
  /* eslint-disable */
  import MainForm from './components/MainForm'
  
  export default {
    name: 'app',
    components: {
      MainForm
    }
  }
</script>

<style>
  #app {
    font-family: 'Avenir', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }
</style>
