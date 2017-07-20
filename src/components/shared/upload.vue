<template>
  <div id="upload">
    <el-tooltip class="item" effect="dark" content="PDF Only" placement="right">
        <input type="file" id="uploader" multiple @change="getFiles"></input>
    </el-tooltip>
  </div>
</template>

<script>
export default {
  name: 'upload',
  data () {
    return {
      fileList: []
    }
  },
  methods: {
    getFiles () {
      let formData = new FormData()
      let files = document.getElementById('uploader').files

      for (let i = 0; i < files.length; i++) {
        formData.append('file' + i, files[i])
      }
      this.fileList = formData
      this.$emit('changeFile', this.fileList)
    }
  }
}
</script>

<style>
/* #uploader {
  display: block;
  position: relative;
  width: 300px;
  cursor: pointer;
  border: 0;
  height: 60px;
  border-radius: 5px;
  outline: 0;
}

#uploader:hover:after {
  background: rgb(238, 126, 51);
}

#uploader:after {
  transition: 200ms all ease;
  border-bottom: 3px solid rgba(0, 0, 0, .2);
  background: #ea5e00;
  text-shadow: 0 2px 0 rgba(0, 0, 0, .2);
  color: #fff;
  font-size: 20px;
  text-align: center;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: block;
  content: 'Select multiple files';
  line-height: 60px;
  border-radius: 5px;
} */
</style>
