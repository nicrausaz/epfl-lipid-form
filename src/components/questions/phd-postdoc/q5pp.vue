<template>
  <div id="q5pp">
    <h3>{{ question }}</h3>
    <el-input type="textarea" :rows="3" placeholder="Please type" v-model="answer" v-on:change="isValid"></el-input>
  </div>
</template>

<script>
export default {
  name: 'q5pp',
  data () {
    return {
      question: '5. Do you have a specific project in mind?',
      answer: ''
    }
  },
  methods: {
    isValid () {
      if (this.answer.split(' ').length <= 150) {
        // emit if valid
        this.$emit('q5pp', this.question, this.answer)
      }
    }
  }
}
</script>

<style scoped>

</style>
