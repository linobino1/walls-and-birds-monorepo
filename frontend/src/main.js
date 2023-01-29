import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
// eslint-disable-next-line no-unused-vars
import apollo from './apollo.js';

import './assets/main.css'

const app = createApp(App)

app.use(router)

app.mount('#app')
