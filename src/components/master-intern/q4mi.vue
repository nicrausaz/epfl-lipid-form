<template>
  <div id="q4mi">
    <h3>{{ question }}</h3>
    <el-switch v-model="showList" on-text="Yes" off-text="No"></el-switch>
  
    <el-select v-if="showList" v-model="selectedResearch" placeholder="Choose">
      <el-option v-for="research in researches" :key="research.name" :value="research.name">
        <span style="float: left">{{ research.name }}</span>
        <span style="float: right; color: #8492a6; font-size: 13px">{{ research.responsibleName }}</span>
      </el-option>
    </el-select>
  </div>
</template>

<script>
import researchList from '../../assets/researchList.json'

export default {
  name: 'q4mi',
  data () {
    return {
      question: 'Is there a specific ongoing research project you would like to contribute to?',
      researches: researchList.researches,
      selectedResearch: '',
      showList: false
    }
  }
}
</script>
