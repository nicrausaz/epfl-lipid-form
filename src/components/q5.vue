<template>
  <div id="q5">
    <h2>{{ question }}</h2>
    <h3>{{ description }}</h3>
    Energy:<el-rate v-model="ratings.ratingEnergy" :colors="['#F79999', '#F7BA2A', '#FF9900']" @change="emitStars"></el-rate>
    Confort:<el-rate v-model="ratings.ratingComfort" :colors="['#F79999', '#F7BA2A', '#FF9900']" @change="emitStars"></el-rate>
    Perception:<el-rate v-model="ratings.ratingPerception" :colors="['#F79999', '#F7BA2A', '#FF9900']" @change="emitStars"></el-rate>
    Health:<el-rate v-model="ratings.ratingHealth" :colors="['#F79999', '#F7BA2A', '#FF9900']" @change="emitStars"></el-rate>
  </div>
</template>

<script>

export default {
  name: 'q5',
  data () {
    return {
      question: 'Which of the following topics would you like to explore in your project?',
      description: 'Select more than one if applicable and specify your level of interest.',
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

</style>
