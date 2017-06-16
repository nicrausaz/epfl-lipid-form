<template>
  <div id="header">
    <el-row :gutter="20">
      <el-col :span="6">
        <img src="static/Logo_EPFL.svg" class="images">
      </el-col>
      <el-col :span="6" :offset="12">
        <img src="static/LIPID.png" class="images">
      </el-col>
    </el-row>
    <h1 style="color: #ea5e00;">
      <a href="http://lipid.epfl.ch/" id="lipidlink">EPFL-LIPID </a> POSTULATION FORM</h1>
    <el-menu class="menu" mode="horizontal"></el-menu>
  
  </div>
</template>

<style>
.menu {
  background-color: #ea5e00;
  color: black;
  height: 20px;
  margin-bottom: 30px;
}

.images {
  width: 250px;
}

#lipidlink {
  text-decoration: none;
  color: black;
}

#lipidlink:hover {
  color: #ea5e00;
}
</style>
