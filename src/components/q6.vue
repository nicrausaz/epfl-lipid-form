<template>
  <div id="q6">
    <h2>{{ question }}</h2>
    <el-switch v-model="showText" on-text="Yes" off-text="No" @change="emitAnswer"></el-switch>
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
      console.log()
    }
  }
}
</script>
