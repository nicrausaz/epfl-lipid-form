<template>
  <div id="q5">
    <h2>{{ question }}</h2>
    <h3>{{ description }}</h3>
    <div class="rate">Energy:<el-rate v-model="ratings.ratingEnergy" :colors="colors" @change="emitStars" ></el-rate></div>
    <div class="rate">Confort:<el-rate v-model="ratings.ratingComfort" :colors="colors" @change="emitStars"></el-rate></div>
    <div class="rate">Perception:<el-rate v-model="ratings.ratingPerception" :colors="colors" @change="emitStars"></el-rate></div>
    <div class="rate">Health:<el-rate v-model="ratings.ratingHealth" :colors="colors" @change="emitStars"></el-rate></div>
  </div>
</template>

<script>

export default {
  name: 'q5',
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
      this.$emit('q5', this.ratings)
    }
  }
}
</script>

<style scoped>
.rate {
  padding-bottom: 10px;
}
</style>
