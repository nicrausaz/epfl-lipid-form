<template>
  <div id="MainForm">
    <div id="content" >
      <epflHeader></epflHeader>
      <JobSelector @job="setJob"></JobSelector>
      <miForm v-if="isMaster || isInternship" @miForm="setData"></miForm>
      <ppForm v-if="isPhd || isPostDoc" @ppForm="setData"></ppForm>
      <el-button id="submitBtn" type="primary" size="large" v-if="isMaster || isInternship || isPhd || isPostDoc" @click="submit">Submit</el-button>
      <pre>{{ errors }}</pre>
      <!--<popup :show="hasError" :errors="errors"></popup>
      {{ hasError }}-->
      <pre>{{ formData }}</pre>
    </div>
  </div>
</template>

<script>
import epflHeader from '@/components/layout/Epflheader'
import JobSelector from '@/components/JobSelector'
import miForm from '@/components/layout/miForm'
import ppForm from '@/components/layout/ppForm'
import popup from '@/components/shared/popup'

export default {
  name: 'MainForm',
  data () {
    return {
      formData: {
        selectedJob: '',
        data: []
      },
      errors: []
    }
  },
  methods: {
    setJob (job) {
      this.formData.selectedJob = job
    },
    setData (data) {
      this.formData.data = data
    },
    submit () {
      this.$http.post('http://lipid-form.local', this.formData)
      .then(response => {
        this.errors = Object.values(response.data).toString()
      })
      .catch(e => {})
    }
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
    },
    hasError () {
      return this.errors.length > 0
    }
  },
  components: {
    epflHeader,
    JobSelector,
    miForm,
    ppForm,
    popup
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
