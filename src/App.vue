<template>
  <div id="app">
    <MainForm></MainForm>
  </div>
</template>

<script>
  /* eslint-disable */
  import MainForm from '@/components/MainForm'

  export default {
    name: 'app',
    components: {
      MainForm
    }
  }
</script>

<style>
  #app {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 13px;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }
</style>
