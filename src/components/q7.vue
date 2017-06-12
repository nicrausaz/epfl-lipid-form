<template>
  <div id="q7">
    <h2>{{ question }}</h2>
    <el-input v-model="personalInfos.name" placeholder="Name" @change="emitInfos"></el-input>
    <el-input v-model="personalInfos.familyName" placeholder="Family name" @change="emitInfos"></el-input>
    <el-input v-model="personalInfos.email" placeholder="email" type="email" @change="emitInfos" ></el-input>
    <el-input v-model="personalInfos.university" placeholder="University of last academic" @change="emitInfos"></el-input>
    <el-date-picker v-model="formatDate" type="date" placeholder="Date" @change="emitInfos"></el-date-picker>
    <el-input v-model="personalInfos.projectFunding" placeholder="Possible project funding" @change="emitInfos"></el-input>
    {{ formatDate }}
  </div>
</template>

<script>
export default {
  name: 'q7',
  data () {
    return {
      question: 'Fill in with personal informations',
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
      this.$emit('q7', this.personalInfos)
    }
  },
  computed: {
    formatDate () {
      // TODO
    }
  }
}
</script>
