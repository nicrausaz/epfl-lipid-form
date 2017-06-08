<template>
  <div id="MainForm">
    <h1>EPFL-LIPID</h1>
    <JobSelector @job="setJob"></JobSelector>
    <q1 v-if="isMaster"></q1>
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
      selectedJob: ''
    }
  },
  methods: {
    setJob (job) {
      this.selectedJob = job
    }
  },
  computed: {
    isMaster () {
      return this.selectedJob === 'Master'
    },
    isInternship () {
      return this.selectedJob === 'Intership'
    },
    isPhd () {
      return this.selectedJob === 'Phd'
    },
    isPostDoc () {
      return this.selectedJob === 'PostDoc'
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
