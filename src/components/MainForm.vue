<template>
  <div id="MainForm">
    <div id="content">
      <epflHeader></epflHeader>
      <JobSelector @job="setJob"></JobSelector>
      <miForm v-if="isMaster || isInternship"></miForm>
      <ppForm v-if="isPhd || isPostDoc"></ppForm>
      <el-button id="submitBtn" type="primary" size="large" v-if="isMaster || isInternship || isPhd || isPostDoc" @click="submit">Submit</el-button>
    </div>
  </div>
</template>

<script>
import epflHeader from '@/components/layout/Epflheader'
import JobSelector from '@/components/JobSelector'
import miForm from '@/components/layout/miForm'
import ppForm from '@/components/layout/ppForm'

export default {
  name: 'MainForm',
  data () {
    return {
      selectedJob: '',
      formData: []
    }
  },
  methods: {
    setJob (job) {
      this.selectedJob = job
    },
    submit () {
      alert('submit!')
    }
  },
  computed: {
    isMaster () {
      return this.selectedJob === 'Master'
    },
    isInternship () {
      return this.selectedJob === 'Internship'
    },
    isPhd () {
      return this.selectedJob === 'Phd'
    },
    isPostDoc () {
      return this.selectedJob === 'PostDoc'
    }
  },
  components: {
    epflHeader,
    JobSelector,
    miForm,
    ppForm
  }
}
</script>

<style>
#MainForm {
  max-width: 1100px;
  margin: auto;
  background-color: #F0F8FF;
}
#content {
  padding: 25px;
}
#submitBtn {
  margin-left: 90%
}
</style>
