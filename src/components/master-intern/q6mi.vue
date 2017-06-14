<template>
  <div id="q6mi">
    <h3>{{ question }}</h3>
    <el-switch v-model="showText" on-text="Yes" off-text="No" @change="emitAnswer"></el-switch>
    <el-input v-if="showText" type="textarea" autosize placeholder="Please type" id="textBox" v-model="answerText"  @change="emitAnswer"></el-input>
  </div>
</template>

<script>

export default {
  name: 'q6mi',
  data () {
    return {
      question: 'Do you have a specific project in mind?',
      answerText: '',
      showText: false
    }
  },
  methods: {
    emitAnswer () {
      this.$emit('q6mi', this.showText, this.answerText)
    }
  }
}
</script>

<style scoped>
#textBox {
  padding-top: 10px;
}
</style>
