<template>
  <div id="q3pp">
    <h3>{{ question }}</h3>
    <el-input type="textarea" :rows="3" placeholder="Please type" v-model="answer" v-on:change="isValid"></el-input>
  </div>
</template>

<script>
export default {
  name: 'q3pp',
  data () {
    return {
      question: '3. How did you get to know about the lab?',
      answer: ''
    }
  },
  methods: {
    isValid () {
      if (this.answer.split(' ').length <= 150) {
        this.$emit('q3pp', this.question, this.answer)
      }
    }
  }
}
</script>
