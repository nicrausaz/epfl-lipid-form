<template>
  <el-upload class="upload" ref="upload" id="uploader" :multiple="true" action="" :auto-upload="false" :on-change="addFile" :on-remove="removeFile">
    <el-button slot="trigger" size="large" type="primary">Choose file</el-button>
  </el-upload>
</template>

<script>
export default {
  data () {
    return {
      fileList: new FormData()
    }
  },
  methods: {
    addFile (file) {
      this.fileList.append(file.raw.uid, file.raw)
      this.$emit('changeFile', this.fileList)
    },
    removeFile (file) {
      this.fileList.delete(file.uid)
    },
    popupNewFile () {
      this.$message({
        message: 'File(s) added',
        type: 'success'
      })
    }
  }
}
</script>

<style scoped>
.upload {
  width: 50%;
}
</style>

