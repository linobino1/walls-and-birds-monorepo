import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
// eslint-disable-next-line no-unused-vars
import apollo from './apollo.js';

import './assets/main.css'
// import './assets/sass/fonts.scss'

console.log('main.js', import.meta.env);

const app = createApp(App)

app.use(router)

app.mount('#app')
