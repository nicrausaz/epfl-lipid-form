<template>
  <div id="q8mi">
    <h3>{{ question }}</h3>
    <h4>{{ description }}</h4>
    <upload @changeFile="emitFiles"></upload>
  </div>
</template>

<script>
import Upload from '@/components/shared/upload'

export default {
  name: 'q8mi',
  data () {
    return {
      question: 'Please upload your CV and any other relevant documents',
      description: '(such as letter of motivation, scientific articles, work samples).'
    }
  },
  methods: {
    emitFiles (files) {
      this.$emit('q8mi', files)
    }
  },
  components: {
    Upload
  }
}
</script>
