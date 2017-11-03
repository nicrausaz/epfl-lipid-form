<template>
  <div id="header">
    <el-row :gutter="20">
      <el-col :span="6" >
        <img src="static/epfl.png" class="images" draggable="false">
      </el-col>
    </el-row>
    <h1 id="title">
      <a href="http://lipid.epfl.ch/" id="lipidlink"> EPFL-LIPID </a> APPLICATION FORM </h1>
    <el-menu class="menu" mode="horizontal"></el-menu>
  </div>
</template>

<style scoped>
.menu {
  background-color: #ea5e00;
  color: black;
  height: 20px;
  margin-bottom: 30px;
}

#title {
  color: #ea5e00;
  font-size: 27px;
  font-family: Impact, "Arial Black", "DejaVu Sans", Arial, Helvetica, sans-serif;
  letter-spacing: 1.89px;
}

.images {
  width: 120px;
}

#lipidlink {
  text-decoration: none;
  color: black;
}

#lipidlink:hover {
  color: #ea5e00;
}
</style>
