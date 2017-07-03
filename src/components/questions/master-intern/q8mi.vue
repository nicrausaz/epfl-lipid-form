<template>
  <div id="q8mi">
    <h3>{{ question }}</h3>
    <h4>{{ description }}</h4>
    <el-upload drag action="http://lipid-form.local/fileUpload.php" :on-preview="handlePreview" :on-remove="handleRemove" :file-list="fileList" multiple>
      <i class="el-icon-upload"></i>
      <div class="el-upload__text">Drop file here or
        <em>click to upload</em>
      </div>
      <div class="el-upload__tip" slot="tip">PDF files only</div>
    </el-upload>
    {{ fileList }}
  </div>
</template>

<script>
export default {
  name: 'q8mi',
  data () {
    return {
      question: 'Please upload your CV and any other relevant documents',
      description: '(such as letter of motivation, scientific articles, work samples).',
      fileList: []
    }
  },
  methods: {
    handlePreview (file, fileList) {
      console.log(fileList)
    },
    handleRemove (file, fileList) {
      console.log('remove')
    }
  }
}
</script>
