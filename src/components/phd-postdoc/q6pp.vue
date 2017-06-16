<template>
  <div id="q6pp">
    <h3>{{ question }}</h3>
    <el-switch v-model="showList" on-text="Yes" off-text="No" @change="emitAnswers"></el-switch>
    <el-select v-if="showList" v-model="selectedProject.name" placeholder="Choose" @change="emitAnswers">
      <el-option v-for="project in projects" :key="project" :value="project.name">
        <span style="float: left">{{ project.name }}</span>
        <span style="float: right; color: #8492a6; font-size: 13px">{{ project.responsibleName }}</span>
      </el-option>
    </el-select>
  </div>
</template>

<script>
import projectList from '../../assets/projectList.json'

export default {
  name: 'q6pp',
  data () {
    return {
      question: 'Identify ongoing projects in LIPID that you think you could connect to your research, directly or indirectly',
      projects: projectList.projects,
      selectedProject: { name: '', responsibleName: '', responsibleMail: '' },
      showList: false
    }
  },
  methods: {
    emitAnswers () {
      this.$emit('q6pp', this.showList, this.selectedProject)
    }
  }
}
</script>
