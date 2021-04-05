require('./panel/bootstrap/bootstrap')
import { createApp } from 'vue'
import App from './App.vue'
import store from "./panel/store/stores"
import router from "./panel/router/routes"

createApp(App)
    .use(store)
    .use(router)
    .mount('#app')