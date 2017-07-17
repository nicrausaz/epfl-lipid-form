<template>
  <div id="upload">
    <input type="file" id="uploader" placeholder="test" multiple @change="getFiles"></input>
    <!-- <el-tooltip class="item" effect="dark" content="PDF Only" placement="right">
      <input type="file" id="uploader" placeholder="test" multiple @change="getFiles"></input>
    </el-tooltip> -->
    <pre>{{fileList}}</pre>
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
      this.fileList = []
      let files = Array.from(document.getElementById('uploader').files)

      files.forEach((file) => {
        this.fileList.push({name: file.name, lastModified: file.lastModified, type: file.type, size: file.size, path: file.webkitRelativePath})
      })

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
