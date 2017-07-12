<template>
  <div id="q5mi" @change="emitStars">
    <h3>{{ question }}</h3>
    <h4>{{ description }}</h4>
    <div class="rate">Energy:<el-rate v-model="ratings.ratingEnergy" :colors="colors" @change="emitStars" ></el-rate></div>
    <div class="rate">Comfort:<el-rate v-model="ratings.ratingComfort" :colors="colors" @change="emitStars"></el-rate></div>
    <div class="rate">Perception:<el-rate v-model="ratings.ratingPerception" :colors="colors" @change="emitStars"></el-rate></div>
    <div class="rate">Health:<el-rate v-model="ratings.ratingHealth" :colors="colors" @change="emitStars"></el-rate></div>
  </div>
</template>

<script>

export default {
  name: 'q5mi',
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
      }
    }
  },
  methods: {
    emitStars () {
      this.$emit('q5mi', this.ratings)
    }
  }
}
</script>

<style scoped>
.rate {
  padding-bottom: 10px;
}
</style>
