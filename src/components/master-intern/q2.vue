<template>
  <div id="q2">
    <h2>{{ question }}</h2>
    <el-input type="textarea" autosize placeholder="Please type" v-model="answer" v-on:change="isValid"></el-input>
  </div>
</template>

<script>
export default {
  name: 'q2',
  data () {
    return {
      question: 'What is it about the lab that makes you interested in? (max 150 words)',
      answer: ''
    }
  },
  methods: {
    isValid () {
      if (this.answer.split(' ').length <= 150) {
        // emit if valid
        this.$emit('q2', this.answer)
      } else {
        alert('TOO MUCH WORDS')
      }
    }
  }
}
</script>
