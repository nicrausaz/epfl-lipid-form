<template>
  <div id="q8">
    <h2>{{ question }}</h2>
    <h3>{{ description }}</h3>
    <el-upload class="upload-demo" action="https://jsonplaceholder.typicode.com/posts/" :on-preview="handlePreview" :on-remove="handleRemove" :file-list="fileList">
      <el-button size="small" type="primary">Click to upload</el-button>
      <div slot="tip" class="el-upload__tip">PDF files only</div>
    </el-upload>
  </div>
</template>

<script>
export default {
  data () {
    return {
      question: 'Please upload your CV and any other relevant documents',
      description: '(such as letter of motivation, scientific articles, work samples).'
    }
  }

}
</script>
