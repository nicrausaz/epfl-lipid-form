<template>
  <div id="upload">
    <label id="uploaderLabel">
	      <input type="file" id="uploader" multiple @change="getFiles"></input>
    </label>
    <!-- <el-tooltip class="item" effect="dark" content="PDF Only" placement="right">
      
    </el-tooltip> -->
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
    btnClick () {
      console.log('click')
      console.log(document.getElementById('uploader'))
      document.getElementById('uploader').click()
    },
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
#uploader {
  visibility: hidden;
	width: 100px
}

#uploaderLabel {
	display: inline-block;
	position: relative;
}

#uploaderLabel:before {
	content: 'Choose Files';
	display: block;
	background: #ea5e00;
	padding: 15px 20px;
	cursor: pointer;
  color: white;
  border-radius: 4px;
	text-align: center;
	font-size: 14pt;
}
</style>
