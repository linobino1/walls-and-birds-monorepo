import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

import './assets/main.css'
// import './assets/sass/fonts.scss'

const app = createApp(App)

app.use(router)

app.provide('MAILING_LIST_ID', import.meta.env.VITE_MAILING_LIST_ID);

app.mount('#app')
