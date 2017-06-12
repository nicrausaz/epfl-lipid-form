<template>
  <div id="q6">
    <h2>{{ question }}</h2>
    <el-switch v-model="showText" on-text="Yes" off-text="No" @change="emitAnswer"></el-switch>
    <el-input v-if="showText" type="textarea" :rows="2" placeholder="Please type" v-model="answerText"  @change="emitAnswer"></el-input>
  </div>
</template>

<script>

export default {
  name: 'q6',
  data () {
    return {
      question: 'Do you have a specific project in mind?',
      answerText: '',
      showText: false
    }
  },
  methods: {
    emitAnswer () {
      this.$emit('q6', this.showText, this.answerText)
    }
  }
}
</script>
