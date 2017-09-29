<template>
  <div id="q7pp">
    <h3>{{ question }}</h3>
    <div class="rate" v-for="rating in ratings" :key="rating.name">{{rating.name}}:
      <el-rate v-model="rating.rate" :colors="colors" @change="emitStars"></el-rate>
    </div>
    <el-row>
      <el-col :span="2">Other:</el-col>
      <el-col :span="5">
        <el-input size="mini" placeholder="Please Input" v-model="other.text"></el-input>
      </el-col>
      </el-col>
    </el-row>
    <div class="rate">
      <el-rate v-model="other.rate" v-if="other.text" :colors="colors" @change="emitStars"></el-rate>
    </div>
  </div>
</template>

<script>
export default {
  name: 'q7pp',
  data () {
    return {
      question: 'Please state your level of competence in the following areas:',
      colors: ['#F79999', '#F7BA2A', '#FF9900'],
      ratings: [
        { name: 'Design/Architecture', rate: 0 },
        { name: 'Urban Planning', rate: 0 },
        { name: 'Building Engineering', rate: 0 },
        { name: 'Building Performance Simulation', rate: 0 },
        { name: 'Daylighting', rate: 0 },
        { name: 'Physics/Mathematics', rate: 0 },
        { name: 'Programming', rate: 0 },
        { name: 'Statistics', rate: 0 },
        { name: 'User Studies', rate: 0 }
      ],
      other: {
        name: 'Other',
        text: '',
        rate: 0
      }
    }
  },
  methods: {
    emitStars () {
      this.$emit('q7pp', this.ratings, this.other)
    }
  }
}
</script>

<style scoped>
.rate {
  padding-bottom: 10px;
}
</style>
