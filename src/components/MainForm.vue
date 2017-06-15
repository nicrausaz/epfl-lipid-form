<template>
  <div id="MainForm">
    <div id="content">
      <epflHeader></epflHeader>
      <el-row class="questions">
          <el-col :span="24"><JobSelector @job="setJob"></JobSelector></el-col>
      </el-row >
      <div  v-if="isMaster || isInternship">
        <el-row class="questions">
            <el-col :span="24"><q1mi @q1mi="setQ1mi"></q1mi></el-col>
        </el-row>
        <el-row class="questions">
            <el-col :span="24"><q2mi @q2mi="setQ2mi"></q2mi></el-col>
        </el-row>
        <el-row class="questions">
            <el-col :span="24"><q3mi @q3mi="setQ3mi"></q3mi></el-col>
        </el-row>
        <el-row class="questions">
            <el-col :span="24"><q4mi></q4mi></el-col>
        </el-row>
        <el-row class="questions">
            <el-col :span="24"><q5mi @q5mi="setQ5mi"></q5mi></el-col>
        </el-row>
        <el-row class="questions">
            <el-col :span="24"><q6mi @q6mi="setQ6mi"></q6mi></q5></el-col>
        </el-row>
        <el-row class="questions">
            <el-col :span="24"><q7mi @q7mi="setQ7mi"></q7mi></el-col>
        </el-row>
        <el-row class="questions">
            <el-col :span="24"><q8mi @q8mi="setQ8mi"></q8mi></q5></el-col>
        </el-row>
      </div>
      <div v-if="isPhd || isPostDoc">
        <el-row class="questions">
          <el-col :span="24"><q1pp @q1pp="setQ1pp"></q1pp></el-col>
        </el-row>
        <el-row class="questions">
          <el-col :span="24"><q2pp></q2pp></el-col>
        </el-row>
        <el-row class="questions">
          <el-col :span="24"><q3pp @q3pp="setQ3pp"></q3pp></el-col>
        </el-row>
        <el-row class="questions">
          <el-col :span="24"><q4pp @q4pp="setQ4pp"></q4pp></el-col>
        </el-row>
      </div>
      <div v-else>
        <h1>Please select</h1>
      </div>
      <pre>
        {{formDataMi}}
        {{formDataPp}}
      </pre>
    </div>
  </div>
</template>

<script>
import epflHeader from './Epflheader'
import JobSelector from './JobSelector'

import q1mi from './master-intern/q1mi'
import q2mi from './master-intern/q2mi'
import q3mi from './master-intern/q3mi'
import q4mi from './master-intern/q4mi'
import q5mi from './master-intern/q5mi'
import q6mi from './master-intern/q6mi'
import q7mi from './master-intern/q7mi'
import q8mi from './master-intern/q8mi'

import q1pp from './phd-postdoc/q1pp'
import q2pp from './phd-postdoc/q2pp'
import q3pp from './phd-postdoc/q3pp'
import q4pp from './phd-postdoc/q4pp'

export default {
  name: 'MainForm',
  data () {
    return {
      formDataMi: {
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
      },
      formDataPp: {
        q1: {
          personalInfos: []
        },
        q2: {},
        q3: {
          text: ''
        },
        q4: {
          ratings: []
        },
        q5: {},
        q6: {},
        q7: {}
      }
    }
  },
  methods: {
    setJob (job) {
      this.formDataMi.selectedJob = job
    },
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
      if (checked) {
        this.formDataMi.q3.selectedProject = selectedProject
      } else {
        this.formDataMi.q3.selectedProject = ''
      }
    },
    setQ4mi () { },
    setQ5mi (ratings) {
      this.formDataMi.q5.ratings = ratings
    },
    setQ6mi (interest, text) {
      this.formDataMi.q6.interest = interest
      this.formDataMi.q6.text = text
    },
    setQ7mi (infos) {
      this.formDataMi.q7.personalInfos = infos
    },
    setQ8mi () { },
    setQ1pp (infos) {
      this.formDataPp.q1.personalInfos = infos
    },
    setQ2pp () {},
    setQ3pp (text) {
      this.formDataPp.q3.text = text
    },
    setQ4pp (ratings) {
      this.formDataPp.q4.ratings = ratings
    }
  },
  computed: {
    isMaster () {
      return this.formDataMi.selectedJob === 'Master'
    },
    isInternship () {
      return this.formDataMi.selectedJob === 'Internship'
    },
    isPhd () {
      return this.formDataMi.selectedJob === 'Phd'
    },
    isPostDoc () {
      return this.formDataMi.selectedJob === 'PostDoc'
    }
  },
  components: {
    epflHeader,
    JobSelector,
    q1mi,
    q2mi,
    q3mi,
    q4mi,
    q5mi,
    q6mi,
    q7mi,
    q8mi,
    q1pp,
    q2pp,
    q3pp,
    q4pp
  }
}
</script>

<style>
#MainForm {
  max-width: 1100px;
  margin: auto;
  background-color: #F0F8FF;
}

.questions {
  padding-bottom: 20px;
}

#content {
  padding: 25px;
}
</style>
