<template>
  <div id="jobSelector">
    <el-row type="flex" class="row-bg" justify="space-around">
      <el-col :span="4" v-for="job in jobs">
        <el-card :body-style="{ padding: '20px' }">
          <img src="../assets/logo.png" class="image">
          <div style="padding: 0px;">
            <span>{{ job.name }}</span>
            <div class="bottom clearfix">
              <el-button type="text" class="button">Operating button</el-button>
            </div>
          </div>
        </el-card>
      </el-col>
    </el-row>
  </div>
</template>

<script>
export default {
  name: 'jobSelector',
  data () {
    return {
      jobs: [
        { name: 'Master' },
        { name: 'Internship' },
        { name: 'Phd' },
        { name: 'PostDoc' }
      ]
    }
  }
}
</script>

<style scoped>
.bottom {
  margin-top: 13px;
  line-height: 12px;
}

.button {
  padding: 0;
  float: right;
}

.image {
  display: block;
}

.clearfix:before,
.clearfix:after {
  display: table;
  content: "";
}

.clearfix:after {
  clear: both
}



.el-row {
  margin-bottom: 20px;
}

.el-col {
  border-radius: 4px;
}

.bg-purple-dark {
  background: #99a9bf;
}

.bg-purple {
  background: #d3dce6;
}

.bg-purple-light {
  background: #e5e9f2;
}

.grid-content {
  border-radius: 4px;
  min-height: 36px;
}

.row-bg {
  padding: 10px 0;
  background-color: #f9fafc;
}
</style>
