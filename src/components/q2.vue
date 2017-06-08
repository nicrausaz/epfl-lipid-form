<template>
  <div id="q2">
    <h1>{{ question }}</h1>
    <el-input type="textarea" :rows="2" placeholder="Please type" v-model="answer" v-on:change="isValid">
    </el-input>
  </div>
</template>

<script>
export default {
  name: 'q2',
  data () {
    return {
      question: 'What is it about the lab that makes you interested in?',
      answer: ''
    }
  },
  methods: {
    isValid () {
      if (this.answer.split(' ').length >= 150) {
        // INVALID
      } else {
        // VALID
      }
    }
  }
}
</script>

<style scoped>

</style>
