<template>
  <div id="q1mi" v-on:change="emitAnswers">
    <h3>{{ question }}</h3>

    <el-checkbox-group v-model="answers" id="checkboxGroup">
      <el-checkbox v-for="option in options" :label="option.label" :key="option"></el-checkbox>
      <el-checkbox label="Other" v-on:change="hasOther = !hasOther"></el-checkbox>
    </el-checkbox-group>
    <el-row>
      <el-col :span="12"><el-input v-if="hasOther" v-model="otherFieldVal" placeholder="Please specify" v-on:change="emitAnswers"></el-input></el-col>
    </el-row>
  </div>
</template>

<script>
export default {
  name: 'q1mi',
  data () {
    return {
      question: '1. How did you get to know about the lab?',
      options: [
        { label: 'Conference paper' },
        { label: 'Journal paper' },
        { label: 'Presentation at EPFL' },
        { label: 'Presentation outside EPFL' },
        { label: 'EPFL Courses' },
        { label: 'EPFL website' }
      ],
      hasOther: false,
      otherFieldVal: '',
      answers: []
    }
  },
  methods: {
    emitAnswers () {
      if (this.hasOther) {
        this.$emit('q1mi', this.question, this.answers, this.otherFieldVal)
      } else {
        this.$emit('q1mi', this.question, this.answers)
      }
    }
  }
}
</script>

<style scoped>
#checkboxGroup {
  padding-bottom: 10px;
}
</style>
