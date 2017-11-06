<template>
  <div id="q8mi">
    <h3>{{ question }}</h3>
    <h4>{{ description }}</h4>
    <!-- <upload @changeFile="emitFiles"></upload> -->
    <testUpload @changeFile="emitFiles"></testUpload>
  </div>
</template>

<script>
import Upload from '@/components/shared/upload'
import testUpload from '@/components/shared/testUpload'

export default {
  name: 'q8mi',
  data () {
    return {
      question: '8. Please upload your CV and any other relevant documents',
      description: '(such as letter of motivation, scientific articles, work samples).'
    }
  },
  methods: {
    emitFiles (files) {
      this.$emit('q8mi', files)
    }
  },
  components: {
    Upload,
    testUpload
  }
}
</script>
