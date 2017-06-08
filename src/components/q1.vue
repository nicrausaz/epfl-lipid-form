<template>
  <div id="q1" v-on:change="emitAnswers">
    <h2>{{ question }}</h2>
    <el-checkbox-group v-model="answers">
      <el-checkbox v-for="(option, key) in options" :label="option.label"></el-checkbox>
      <el-checkbox label="Other" v-on:change="isOther = !isOther"></el-checkbox>
    </el-checkbox-group>
    <el-input v-if="isOther" v-model="otherFieldVal" placeholder="Please specify"></el-input>
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
      isOther: false,
      otherFieldVal: '',
      answers: []
    }
  },
  methods: {
    emitAnswers () {
      if (this.isOther) {
        this.$emit('q1', this.answers)
        this.$emit('q1', this.otherFieldVal)
      }
      this.$emit('q1', this.answers)
      console.log(this.answers)
    }
  }
}
</script>

<style>

</style>
