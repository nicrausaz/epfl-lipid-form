<template>
<div @change="addFile">
<el-upload class="upload" ref="upload" action="" :auto-upload="false">
  <el-button slot="trigger" size="large" type="primary">Choose file</el-button>
</el-upload>
</div>
</template>

<script>
export default {
  data () {
    return {
      fileList: []
    }
  },
  methods: {
    addFile () {
      let formData = new FormData()
      let files = this.$refs.upload.uploadFiles
      // let files = document.getElementById('uploader').files
      for (let i = 0; i < files.length; i++) {
        formData.append('file' + i, files[i])
      }
      this.fileList = formData
      // this.popupNewFile()
      this.$emit('changeFile', this.fileList)
    }
  }
}
</script>

<style scoped>
.upload {
  width: 50%;
}
</style>

