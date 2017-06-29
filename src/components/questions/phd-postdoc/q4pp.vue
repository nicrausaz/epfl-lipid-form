<template>
  <div id="q4pp">
    <h3>{{ question }}</h3>
    <h4>{{ description }}</h4>

    Energy:
    <div class="rate">
      <el-rate v-model="ratings.ratingEnergy" :colors="colors" @change="emitStars"></el-rate>
    </div>
  
    Confort:
    <div class="rate">
      <el-rate v-model="ratings.ratingComfort" :colors="colors" @change="emitStars"></el-rate>
    </div>
  
    Perception:
    <div class="rate">
      <el-rate v-model="ratings.ratingPerception" :colors="colors" @change="emitStars"></el-rate>
    </div>
  
    Health:
    <div class="rate">
      <el-rate v-model="ratings.ratingHealth" :colors="colors" @change="emitStars"></el-rate>
    </div>
  
    <el-row>
      <el-col :span="2">Other:</el-col>
      <el-col :span="5">
        <el-input size="mini" placeholder="Please Input" v-model="ratings.other.text" @change="isOtherSelected"></el-input>
      </el-col>
      </el-col>
    </el-row>
  
    <div class="rate">
      <el-rate v-if="ratings.other.selected" v-model="ratings.other.rate" :colors="colors" @change="emitStars"></el-rate>
    </div>
  </div>
</template>

<script>
export default {
  name: 'q4pp',
  data () {
    return {
      question: 'Which of the following topics would you like to explore in your project?',
      description: 'Select more than one if applicable and specify your level of interest.',
      colors: ['#F79999', '#F7BA2A', '#FF9900'],
      ratings: {
        ratingEnergy: 0,
        ratingComfort: 0,
        ratingPerception: 0,
        ratingHealth: 0,
        other: {
          selected: false,
          text: '',
          rate: 0
        }
      }
    }
  },
  methods: {
    emitStars () {
      this.$emit('q4pp', this.ratings)
    },
    isOtherSelected () {
      this.text === '' ? this.ratings.other.selected = false : this.ratings.other.selected = true
      return this.ratings.other.selected
    }
  }
}
</script>

<style scoped>
.rate {
  padding-bottom: 10px;
  padding-top: 5px;
}
</style>
