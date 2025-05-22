/* eslint-disable */
import App from './App.vue'
import { createApp } from 'vue'
import BootstrapVueNext from 'bootstrap-vue-next'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue-next/dist/bootstrap-vue-next.css'

//import router
import router from "./router";

const app = createApp(App)
app.use(BootstrapVueNext)
app.use(router)
app.mount('#app')