<template>
  <div id="q7mi">
    <h3>{{ question }}</h3>
    <el-input v-model="personalInfos.name" placeholder="Name" @change="emitInfos" class="inputs"></el-input>
    <el-input v-model="personalInfos.familyName" placeholder="Family name" @change="emitInfos" class="inputs"></el-input>
    <el-input v-model="personalInfos.email" placeholder="Email" type="email" @change="emitInfos" class="inputs"></el-input>
    <el-input v-model="personalInfos.university" placeholder="University of last academic" @change="emitInfos" class="inputs"></el-input>
    <el-date-picker v-model="personalInfos.projectDate" type="date" placeholder="Date" @change="emitInfos" class="inputs" format="dd/MM/yyyy"></el-date-picker>
    <el-input v-model="personalInfos.projectFunding" placeholder="Possible project funding" @change="emitInfos" class="inputs"></el-input>
  </div>
</template>

<script>
export default {
  name: 'q7mi',
  data () {
    return {
      question: '7. Fill in with personal information',
      personalInfos: {
        name: '',
        familyName: '',
        email: '',
        university: '',
        projectDate: '',
        projectFunding: ''
      }
    }
  },
  methods: {
    emitInfos () {
      this.$emit('q7mi', this.personalInfos)
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
