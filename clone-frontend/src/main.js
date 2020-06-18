import Vue from 'vue'
import App from './App.vue'
import 'bootstrap/dist/css/bootstrap.css'
import './assets/css/layout.css'
import router from './router'

new Vue({
  el: '#app',
  router,
  render: h => h(App)
})
