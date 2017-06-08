<template>
  <div id="jobSelector">
    <el-row type="flex" justify="space-around">
      <el-col :span="4" v-for="job in jobs">
        <el-card :body-style="{ padding: '20px' }">
          <img src="../assets/pingu.png" draggable="false" class="image" @click="setSelectedJob(job.name)">
            <span>{{ job.name }}</span>
        </el-card>
      </el-col>
    </el-row>
  </div>
</template>

<script>
export default {
  name: 'jobSelector',
  data () {
    return {
      jobs: [
        { name: 'Master' },
        { name: 'Internship' },
        { name: 'Phd' },
        { name: 'PostDoc' }
      ],
      selectedJob: ''
    }
  },
  methods: {
    setSelectedJob (jobName) {
      this.selectedJob = jobName
      this.emitJob()
    },
    emitJob () {
      this.$emit('job', this.selectedJob)
    }
  }
}
</script>
