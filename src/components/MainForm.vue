<template>
  <div id="MainForm">
    <h1>EPFL-LIPID</h1>
    <JobSelector @job="setJob"></JobSelector>
    <q1 @q1="setQ1"></q1>
    <q2></q2>
    <q3></q3>
    <q4></q4>
    <q5></q5>
  </div>
</template>

<script>
import JobSelector from './JobSelector'
import q1 from './q1'
import q2 from './q2'
import q3 from './q3'
import q4 from './q4'
import q5 from './q5'

export default {
  name: 'MainForm',
  data () {
    return {
      formData: {
        selectedJob: '',
        q1: {
          choices: [],
          textOther: ''
        }
      }
    }
  },
  methods: {
    setJob (job) {
      this.formData.selectedJob = job
    },
    setQ1 (answers, text) {
      this.formData.q1.choices = answers
      if (text) {
        this.formData.q1.textOther = text
      }
    }
  },
  computed: {
    isMaster () {
      return this.formData.selectedJob === 'Master'
    },
    isInternship () {
      return this.formData.selectedJob === 'Intership'
    },
    isPhd () {
      return this.formData.selectedJob === 'Phd'
    },
    isPostDoc () {
      return this.formData.selectedJob === 'PostDoc'
    }
  },
  components: {
    JobSelector,
    q1,
    q2,
    q3,
    q4,
    q5
  }
}
</script>

<style>
#MainForm {
  max-width: 1250px;
  margin: auto;
  background-color: #f9fafc;
}
</style>
