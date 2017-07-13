<template>
  <div id="upload">
     <el-tooltip class="item" effect="dark" content="PDF Only" placement="right">
      <input type="file" id="uploader" placeholder="test" multiple @change="getFiles"></input>
    </el-tooltip> 
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
      // console.dir(document.getElementById('uploader').files)
      // let fileList = document.getElementById('uploader').files
      // fileList.push(this.fileList[0])
      let list = Array.from(document.getElementById('uploader').files)
      list.forEach((file) => {
        this.fileList.push(file.name)
      })
      // test.push(document.getElementById('uploader').files[0])
      // console.log(test)
      // for (let i = 0; i < this.fileList.length; i++) {
      //   this.fileList.push(this.fileList[i])
      // }
      // if (this.fileList.length !== 0) {
      //   this.$message(this.fileList.length + 'file(s) selected')
      // }
      this.$emit('changeFile', this.fileList)
    }
  }
}
</script>

<style>
#uploader {
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
}
</style>
