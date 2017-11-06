<template>
  <div id="jobSelector">
    <el-row type="flex" justify="space-around" style="padding-left: ">
      <el-col :span="6" v-for="job in jobs" :key="job">
        <el-card :body-style="{ padding: '0px' }" class="cards" v-bind:class="{ active: selectedJob === job.name }">
          <img draggable="false" class="image" :src="job.img" @click="setSelectedJob(job.name)">
          <div class="cardTitle">{{ job.name }}</div>
        </el-card>
      </el-col>
    </el-row>
  </div>
</template><script>

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
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
  width: 200px;
}

.active {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  border-bottom-color: #ea5e00;
  border-bottom-width: 2px;
}

.image {
  width: 200px;
  height: 180px;
}

#jobSelector {
  padding-bottom: 50px;
}

.cardTitle {
  text-align: center;
  font-size: 20px;
}
</style>
