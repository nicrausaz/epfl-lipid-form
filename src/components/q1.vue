<template>
  <div id="q1" v-on:change="emitAnswers">
    <h2>{{ question }}</h2>
    <el-checkbox-group v-model="answers">
      <el-checkbox v-for="option in options" :label="option.label" :key="option"></el-checkbox>
      <el-checkbox label="Other" v-on:change="hasOther = !hasOther"></el-checkbox>
    </el-checkbox-group>
    <el-input v-if="hasOther" v-model="otherFieldVal" placeholder="Please specify" v-on:change="emitAnswers"></el-input>
  </div>
</template>

<script>
export default {
  name: 'q1',
  data () {
    return {
      question: 'How did you get to know about the lab?',
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
        this.$emit('q1', this.answers, this.otherFieldVal)
      } else {
        this.$emit('q1', this.answers)
      }
    }
  }
}
</script>

<style>

</style>
