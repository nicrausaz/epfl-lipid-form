<template>
  <div id="q3">
    <h2>{{ question }}</h2>
    <el-switch v-model="showList" on-text="Yes" off-text="No"></el-switch>
  
    <el-select v-if="showList" v-model="selectedProject" placeholder="Choose">
      <el-option v-for="project in projects" :key="project.name" :value="project.name">
        <span style="float: left">{{ project.name }}</span>
        <span style="float: right; color: #8492a6; font-size: 13px">{{ project.responsibleName }}</span>
      </el-option>
    </el-select>
  </div>
</template>

<script>
import projectList from '../assets/projectList.json'

export default {
  name: 'q3',
  data () {
    return {
      question: 'Is there a specific currently proposed project you would like to work at?',
      projects: projectList.projects,
      selectedProject: '',
      showList: false
    }
  }
}
</script>
