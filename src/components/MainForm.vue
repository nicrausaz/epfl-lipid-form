<template>
  <div id="MainForm">
    <h1>EPFL-LIPID</h1>
    <JobSelector @job="setJob"></JobSelector>

      <div v-if="isMaster || isInternship" >
        <q1 @q1="setQ1"></q1>
        <q2 @q2="setQ2"></q2>
        <q3 @q3="setQ3"></q3>
        <q4></q4>
        <q5 @q5="setQ5"></q5>
        <q6 @q6="setQ6"></q6>
        <q7 @q7="setQ7"></q7>
        <q8 @q8="setQ8"></q8>
      </div>
      <div v-else>
        EMPTY
      </div>

    <pre>
      {{formData}}
    </pre>
  </div>
</template>

<script>
import JobSelector from './JobSelector'
import q1 from './q1'
import q2 from './q2'
import q3 from './q3'
import q4 from './q4'
import q5 from './q5'
import q6 from './q6'
import q7 from './q7'
import q8 from './q8'

export default {
  name: 'MainForm',
  data () {
    return {
      formData: {
        selectedJob: '',
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
          selectedProject: ''
        },
        q5: {
          ratings: []
        },
        q6: {
          interest: '',
          text: ''
        },
        q7: {
          personalInfos: []
        },
        q8: { }
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
    },
    setQ2 (answer) {
      this.formData.q2.interestInLab = answer
    },
    setQ3 (checked, selectedProject) {
      this.formData.q3.interest = checked
      if (checked) {
        this.formData.q3.selectedProject = selectedProject
      } else {
        this.formData.q3.selectedProject = ''
      }
    },
    setQ5 (ratings) {
      this.formData.q5.ratings = ratings
    },
    setQ6 (interest, text) {
      this.formData.q6.interest = interest
      this.formData.q6.text = text
    },
    setQ7 (infos) {
      this.formData.q7.personalInfos = infos
    },
    setQ8 () { },
    setQ9 () { }
  },
  computed: {
    isMaster () {
      return this.formData.selectedJob === 'Master'
    },
    isInternship () {
      return this.formData.selectedJob === 'Internship'
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
    q5,
    q6,
    q7,
    q8
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
