<template>
  <div id="q2mi">
    <h3>{{ question }}</h3>
    <el-input type="textarea" :rows="3" placeholder="Please type" v-model="answer" @change="isValid"></el-input>
  </div>
</template>

<script>
export default {
  name: 'q2mi',
  data () {
    return {
      question: '2. What is it about the lab that makes you interested in? (max 150 words)',
      answer: ''
    }
  },
  methods: {
    isValid () {
      if (this.answer.split(' ').length <= 150) {
        this.$emit('q2mi', this.question, this.answer)
      }
    }
  }
}
</script>
