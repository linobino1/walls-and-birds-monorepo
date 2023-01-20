import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

import './assets/main.css'
// import './assets/sass/fonts.scss'

console.log('main.js', import.meta.env);

const app = createApp(App)

app.use(router)

app.mount('#app')
