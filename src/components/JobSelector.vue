<template>
  <div id="jobSelector">
    <el-row type="flex" justify="space-around">
      <el-col :span="4" v-for="job in jobs" :key="job" >
        <el-card :body-style="{ padding: '20px' }" class="cards">
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
        { name: 'Master', img: '../src/assets/pingu.png' },
        { name: 'Internship', img: '../assets/pingu.png' },
        { name: 'Phd', img: '../assets/pingu.png' },
        { name: 'PostDoc', img: '../assets/pingu.png' }
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

<style scoped>
.cards {
  cursor: pointer;
  background-color: lightgoldenrodyellow;
  -webkit-user-select: none;    
  -moz-user-select: none;
  -ms-user-select: none;
  /* Rules below not implemented in browsers yet */
  -o-user-select: none;
  user-select: none;
}
</style>
