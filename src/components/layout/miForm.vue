<template>
  <div id="miForm" @change="emitData">
    <question-wrapper>
      <q1mi @q1mi="setQ1mi" slot="question"></q1mi>
    </question-wrapper>
    <question-wrapper>
      <q2mi @q2mi="setQ2mi" slot="question"></q2mi>
    </question-wrapper>
    <question-wrapper>
      <q3mi @q3mi="setQ3mi" slot="question"></q3mi>
    </question-wrapper>
    <question-wrapper>
      <q4mi @q4mi="setQ4mi" slot="question"></q4mi>
    </question-wrapper>
    <question-wrapper>
      <q5mi @q5mi="setQ5mi" slot="question"></q5mi>
    </question-wrapper>
    <question-wrapper>
      <q6mi @q6mi="setQ6mi" slot="question"></q6mi>
    </question-wrapper>
    <question-wrapper>
      <q7mi @q7mi="setPersonalInfos" slot="question"></q7mi>
    </question-wrapper>
    <question-wrapper>
      <q8mi @q8mi="setFiles" slot="question"></q8mi>
    </question-wrapper>
  </div>
</template>

<script>
import QuestionWrapper from '@/components/shared/questionWrapper'
import q1mi from '@/components/questions/master-intern/q1mi'
import q2mi from '@/components/questions/master-intern/q2mi'
import q3mi from '@/components/questions/master-intern/q3mi'
import q4mi from '@/components/questions/master-intern/q4mi'
import q5mi from '@/components/questions/master-intern/q5mi'
import q6mi from '@/components/questions/master-intern/q6mi'
import q7mi from '@/components/questions/master-intern/q7mi'
import q8mi from '@/components/questions/master-intern/q8mi'

export default {
  name: 'miForm',
  data () {
    return {
      formDataMi: {
        personalInfos: [],
        q1: {
          choices: [],
          textOther: ''
        },
        q2: {
          interestInLab: ''
        },
        q3: {
          interest: '',
          selectedProject: ''
        },
        q4: {
          interest: '',
          selectedResearch: ''
        },
        q5: {
          ratings: []
        },
        q6: {
          interest: '',
          text: ''
        }
      },
      files: []
    }
  },
  methods: {
    setQ1mi (answers, text) {
      this.formDataMi.q1.choices = answers
      if (text) {
        this.formDataMi.q1.textOther = text
      }
    },
    setQ2mi (answer) {
      this.formDataMi.q2.interestInLab = answer
    },
    setQ3mi (checked, selectedProject) {
      this.formDataMi.q3.interest = checked
      checked ? this.formDataMi.q3.selectedProject = selectedProject : this.formDataMi.q3.selectedProject = ''
    },
    setQ4mi (checked, selectedResearch) {
      this.formDataMi.q4.interest = checked
      checked ? this.formDataMi.q4.selectedResearch = selectedResearch : this.formDataMi.q4.selectedResearch = ''
    },
    setQ5mi (ratings) {
      this.formDataMi.q5.ratings = ratings
    },
    setQ6mi (interest, text) {
      this.formDataMi.q6.interest = interest
      this.formDataMi.q6.text = text
    },
    setPersonalInfos (infos) {
      this.formDataMi.personalInfos = infos
    },
    setFiles (files) {
      this.files = files
    },
    emitData () {
      this.$emit('miForm', this.formDataMi, this.files)
    }
  },
  components: {
    QuestionWrapper,
    q1mi,
    q2mi,
    q3mi,
    q4mi,
    q5mi,
    q6mi,
    q7mi,
    q8mi
  }
}
</script>
