<template>
  <div id="jobSelector">
    <el-row type="flex" justify="space-around">
      <el-col :span="8" v-for="job in jobs" :key="job">
        <el-card :body-style="{ padding: '0px' }" class="cards">
          <img draggable="false" class="image" :src="job.img" @click="setSelectedJob(job.name)">
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
        { name: 'Master', img: 'static/master.jpg' },
        { name: 'Internship', img: 'static/Internship.jpg' },
        { name: 'Phd', img: 'static/Phd.jpg' },
        { name: 'PostDoc', img: 'static/postdoc.jpg' }
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
  /* background-color: #ea5e00; */
  -webkit-user-select: none;    
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
  width: 200px;
}
.image {
  width: 200px;
  height: 180px;
}
#jobSelector {
  padding-bottom: 30px;
}
</style>
