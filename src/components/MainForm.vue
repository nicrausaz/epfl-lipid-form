<template>
  <div id="MainForm">
    <h1>EPFL-LIPID</h1>
    <JobSelector></JobSelector>
    <q1></q1>
    <q2></q2>
    <q3></q3>
    <q4></q4>
  </div>
</template>

<script>
import JobSelector from './JobSelector'
import q1 from './q1'
import q2 from './q2'
import q3 from './q3'
import q4 from './q4'

export default {
  name: 'MainForm',

  components: {
    JobSelector,
    q1,
    q2,
    q3,
    q4
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
