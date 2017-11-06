<template>
  <el-upload class="upload" ref="upload" id="uploader" :multiple="true" action="" :auto-upload="false" :on-change="addFile" :on-remove="removeFile">
    <el-button slot="trigger" size="large" type="primary">Choose file</el-button>
  </el-upload>
</template>

<script>
export default {
  data () {
    return {
      fileList: new FormData(),
      index: 0
    }
  },
  methods: {
    addFile (file) {
      this.fileList.append(this.index, file.raw)
      this.$emit('changeFile', this.fileList)
      this.index ++
    },
    removeFile (file) {
      console.log(file) // TODO: make this work
      this.fileList.delete(file)
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

