<template>
  <div id="q3pp">
    <h3>{{ question }}</h3>
    <el-input type="textarea" autosize placeholder="Please type" v-model="answer" v-on:change="isValid"></el-input>
  </div>
</template>

<script>
export default {
  name: 'q3pp',
  data () {
    return {
      question: 'How did you get to know about the lab?',
      answer: ''
    }
  },
  methods: {
    isValid () {
      if (this.answer.split(' ').length <= 150) {
        // emit if valid
        this.$emit('q3pp', this.answer)
      } else {
        alert('TOO MUCH WORDS')
      }
    }
  }
}
</script>
