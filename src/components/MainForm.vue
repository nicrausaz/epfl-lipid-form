<template>
  <div id="MainForm">
    <h1>EPFL-LIPID</h1>
    <JobSelector></JobSelector>
    <q1></q1>
    <q2></q2>
  </div>
</template>

<script>
import JobSelector from './JobSelector'
import q1 from './q1'
import q2 from './q2'

export default {
  name: 'MainForm',
  components: {
    JobSelector,
    q1,
    q2
  },
  data () {
    return {
      jobs: [
        { name: 'Master' },
        { name: 'Internship' },
        { name: 'Phd' },
        { name: 'PostDoc' }
      ],
      form: {
        name: '',
        region: '',
        date1: '',
        date2: '',
        delivery: false,
        type: [],
        resource: '',
        desc: ''
      }
    }
  },
  methods: {
    submit () {
      console.log(this.form)
    }
  }
}
</script>

<style>
#MainForm {
  max-width: 1250px;
  margin: auto;
  border-style: groove;
}
</style>
