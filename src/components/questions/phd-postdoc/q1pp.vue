<template>
  <div id="q1pp">
    <h3>{{ question }}</h3>

    <el-input v-model="personalInfos.name" placeholder="Name" @change="emitInfos" class="inputs"></el-input>
    <el-input v-model="personalInfos.familyName" placeholder="Family name" @change="emitInfos" class="inputs"></el-input>
    <el-input v-model="personalInfos.email" placeholder="Email" type="email" @change="emitInfos" class="inputs"></el-input>
    <el-input v-model="personalInfos.university" placeholder="Education (University Affiliations and degrees)" @change="emitInfos" class="inputs"></el-input>
    <el-date-picker v-model="personalInfos.projectDate" type="date" placeholder="From when you would be available to start your research?" format="dd/MM/yyyy" @change="emitInfos" class="inputs"></el-date-picker>
    <el-input v-model="personalInfos.projectFunding" placeholder="Possible project funding" @change="emitInfos" class="inputs"></el-input>
    <el-input v-model="personalInfos.personalURL" placeholder="Optional: Personal URL" @change="emitInfos" class="inputs"></el-input>
  </div>
</template>

<script>
export default {
  name: 'q1pp',
  data () {
    return {
      question: '1. Fill in with personal information',
      personalInfos: {
        name: '',
        familyName: '',
        email: '',
        university: '',
        projectDate: '',
        projectFunding: '',
        personalURL: ''
      }
    }
  },
  methods: {
    emitInfos () {
      this.$emit('q1pp', this.personalInfos)
    }
  }
}
</script>

<style scoped>
.inputs {
  padding-bottom: 10px;
  width: 50%;
  font-size: 13px;
}
</style>
