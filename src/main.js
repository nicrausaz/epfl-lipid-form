// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.

import '../theme/index.css'
import ElementUI from 'element-ui'
import locale from 'element-ui/lib/locale/lang/en'
import Vue from 'vue'
import axios from 'axios'
import App from './App'

Vue.config.productionTip = false
Vue.use(ElementUI, { locale })

Vue.prototype.$http = axios

/* eslint-disable no-new */
new Vue({
  el: '#app',
  template: '<App/>',
  render: h => h(App),
  components: { App }
})
