<template>
  <div id="q5pp">
    <h3>{{ question }}</h3>
    <el-input type="textarea" autosize placeholder="Please type" v-model="answer" v-on:change="isValid"></el-input>
  </div>
</template>

<script>
export default {
  name: 'q5pp',
  data () {
    return {
      question: 'Do you have a specific project in mind?',
      answer: ''
    }
  },
  methods: {
    isValid () {
      if (this.answer.split(' ').length <= 150) {
        // emit if valid
        this.$emit('q5pp', this.answer)
      } else {
        alert('TOO MUCH WORDS')
      }
    }
  }
}
</script>

<style scoped>

</style>
