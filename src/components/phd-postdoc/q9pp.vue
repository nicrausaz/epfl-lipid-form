<template>
  <div id="q9pp">
    <h3>{{ question }}</h3>
    <el-input type="textarea" autosize placeholder="Please type" v-model="answer" @change="isValid"></el-input>
  </div>
</template>

<script>
export default {
  name: 'q9pp',
  data () {
    return {
      question: 'Why do you think LIPID would be a good fit for you?',
      answer: ''
    }
  },
  methods: {
    isValid () {
      if (this.answer.split(' ').length <= 150) {
        // emit if valid
        this.$emit('q9pp', this.answer)
      } else {
        alert('TOO MUCH WORDS')
      }
    }
  }
}
</script>
