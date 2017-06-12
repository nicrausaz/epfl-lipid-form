<template>
  <div id="q2">
    
    <el-row :gutter="20">
      <el-col :span="10"><h2>{{ question }}</h2></el-col>
    </el-row>
    <el-row :gutter="20">
      <el-col :span="4" :offset="6"><el-input type="textarea" autosize placeholder="Please type" v-model="answer" v-on:change="isValid"></el-input></el-col>
    </el-row>
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
