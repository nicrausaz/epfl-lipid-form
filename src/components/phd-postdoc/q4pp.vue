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
        <el-input size="mini" placeholder="Please Input" v-model="other.text" @change="isOtherSelected"></el-input>
      </el-col>
      </el-col>
    </el-row>
  
    <div class="rate" >
      <el-rate v-if="other.selected" v-model="other.rate" :colors="colors"></el-rate>
    </div>

    {{ other }}

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
        ratingHealth: 0
      },
      other: {
        selected: false,
        text: '',
        rate: 0
      }
    }
  },
  methods: {
    emitStars () {
      this.$emit('q4pp', this.ratings)

      if (this.other.selected) {
        console.log()
      }
    },
    isOtherSelected () {
      this.text === '' ? this.other.selected = false : this.other.selected = true
      return this.other.selected
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
