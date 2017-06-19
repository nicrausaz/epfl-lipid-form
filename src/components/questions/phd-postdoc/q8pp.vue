<template>
  <div id="q8pp">
    <h3>{{ question }}</h3>
    <el-input type="textarea" autosize placeholder="Please type" v-model="answer" @change="isValid"></el-input>
  </div>
</template>

<script>
export default {
  name: 'q8pp',
  data () {
    return {
      question: 'Why do you think you would be a good fit for LIPID?',
      answer: ''
    }
  },
  methods: {
    isValid () {
      if (this.answer.split(' ').length <= 150) {
        // emit if valid
        this.$emit('q8pp', this.answer)
      } else {
        alert('TOO MUCH WORDS')
      }
    }
  }
}
</script>
