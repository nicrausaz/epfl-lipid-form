<template>
  <div id="ppForm" @change="emitData">
    <question-wrapper>
      <q1pp @q1pp="setPersonalInfos" slot="question"></q1pp>
    </question-wrapper>
    <question-wrapper>
      <q2pp @q1pp="setFiles" slot="question"></q2pp>
    </question-wrapper>
    <question-wrapper>
      <q3pp @q3pp="setQ3pp" slot="question"></q3pp>
    </question-wrapper>
    <question-wrapper>
      <q4pp @q4pp="setQ4pp" slot="question"></q4pp>
    </question-wrapper>
    <question-wrapper>
      <q5pp @q5pp="setQ5pp" slot="question"></q5pp>
    </question-wrapper>
    <question-wrapper>
      <q6pp @q6pp="setQ6pp" slot="question"></q6pp>
    </question-wrapper>
    <question-wrapper>
      <q7pp @q7pp="setQ7pp" slot="question"></q7pp>
    </question-wrapper>
    <question-wrapper>
      <q8pp @q8pp="setQ8pp" slot="question"></q8pp>
    </question-wrapper>
    <question-wrapper>
      <q9pp @q9pp="setQ9pp" slot="question"></q9pp>
    </question-wrapper>
  </div>
</template>

<script>
import QuestionWrapper from '@/components/shared/questionWrapper'
import q1pp from '@/components/questions/phd-postdoc/q1pp'
import q2pp from '@/components/questions/phd-postdoc/q2pp'
import q3pp from '@/components/questions/phd-postdoc/q3pp'
import q4pp from '@/components/questions/phd-postdoc/q4pp'
import q5pp from '@/components/questions/phd-postdoc/q5pp'
import q6pp from '@/components/questions/phd-postdoc/q6pp'
import q7pp from '@/components/questions/phd-postdoc/q7pp'
import q8pp from '@/components/questions/phd-postdoc/q8pp'
import q9pp from '@/components/questions/phd-postdoc/q9pp'

export default {
  name: 'ppForm',
  data () {
    return {
      formDataPp: {
        personalInfos: [],
        files: [],
        q3: {
          answer: ''
        },
        q4: {
          ratings: []
        },
        q5: {
          answer: ''
        },
        q6: {
          interest: '',
          selectedProject: ''
        },
        q7: {
          ratings: [],
          other: []
        },
        q8: {
          answer: ''
        },
        q9: {
          answer: ''
        }
      }
    }
  },
  methods: {
    setPersonalInfos (infos) {
      this.formDataPp.personalInfos = infos
    },
    setFiles () { },
    setQ3pp (answer) {
      this.formDataPp.q3.answer = answer
    },
    setQ4pp (ratings) {
      this.formDataPp.q4.ratings = ratings
    },
    setQ5pp (answer) {
      this.formDataPp.q5.answer = answer
    },
    setQ6pp (interest, project) {
      this.formDataPp.q6.interest = interest
      interest ? this.formDataPp.q6.selectedProject = project : this.formDataPp.q6.selectedProject = ''
    },
    setQ7pp (ratings, other) {
      this.formDataPp.q7.ratings = ratings
      this.formDataPp.q7.other = other
    },
    setQ8pp (answer) {
      this.formDataPp.q8.answer = answer
    },
    setQ9pp (answer) {
      this.formDataPp.q9.answer = answer
    },
    emitData () {
      this.$emit('ppForm', this.formDataPp)
    }
  },
  components: {
    QuestionWrapper,
    q1pp,
    q2pp,
    q3pp,
    q4pp,
    q5pp,
    q6pp,
    q7pp,
    q8pp,
    q9pp
  }
}
</script>
