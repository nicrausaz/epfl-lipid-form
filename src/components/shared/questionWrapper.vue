<template>
  <el-row class="questions">
    <el-col :span="24">
      <slot name="question"></slot>
    </el-col>
  </el-row>
</template>

<style>
.questions {
  padding-bottom: 20px;
}
</style>
