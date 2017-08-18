<template>
  <div id="MainForm">
    <div id="content">
      <epflHeader></epflHeader>
      <JobSelector @job="setJob"></JobSelector>
      <miForm v-if="isMaster || isInternship" @miForm="setData"></miForm>
      <ppForm v-if="isPhd || isPostDoc" @ppForm="setData"></ppForm>
      <el-button id="submitBtn" type="primary" size="large" v-if="isMaster || isInternship || isPhd || isPostDoc" @click="submit">Submit</el-button>
      <el-dialog title="Some errors happened" :visible.sync="dialogVisible">
        <div v-for="error in errors" :key="error"><h3>{{error}}</h3></div>
      </el-dialog>
      <pre>{{ errors }}</pre>
      <pre>{{ formData }}</pre>
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
      formData: {
        selectedJob: '',
        data: [],
        files: []
      },
      errors: [],
      dialogVisible: false
    }
  },
  methods: {
    setJob (job) {
      this.formData.selectedJob = job
    },
    setData (data, files) {
      this.formData.data = data
      this.formData.files = files
    },
    popupMissingFile () {
      this.$message({
        message: 'Please select on file at least',
        type: 'error'
      })
    },
    createObjFormData () {
      let formData = new FormData()
      let stringFormData = JSON.stringify(this.formData)
      let i = 0

      formData.append('formData', stringFormData)
      if (this.formData.files.length !== 0) {
        for (let value of this.formData.files.values()) {
          formData.append('file' + i, value)
          i++
        }
      } else {
        this.popupMissingFile()
      }
      return formData
    },
    submit () {
      let formData = this.createObjFormData()
      this.$http.post('http://lipid-form.local', formData)
      .then(response => {
        console.log(Object.values(response.data).toString().split(','))
        this.errors = Object.values(response.data).toString().split(',')
        if (this.errors.length > 0) {
          this.dialogVisible = true
        } else {
          window.location.replace('https://google.ch')
        }
      })
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
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
#content {
  padding: 25px;
}
#submitBtn {
  margin-left: 90%
}
</style>
