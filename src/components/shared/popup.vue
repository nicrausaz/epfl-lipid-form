<template>
  <div id="errorPopup">
    <el-dialog title="Some errors happened" :visible.sync="visible" size="tiny">
      <span>{{ hasError }}</span>
      <span>{{ errors }}</span>
      <span slot="footer" class="dialog-footer">
        <el-button type="primary" @click="hasError = false">Back</el-button>
      </span>
    </el-dialog>
  </div>
</template>

<script>
export default {
  name: 'errorPopup',
  props: ['hasError', 'errors'],
  data () {
    return {
      visible: false
    }
  }
}
</script>
