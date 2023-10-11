require('./bootstrap');

import { createApp } from 'vue'
import Dashboard from './component/Dashboard.vue'

const app = createApp({})

app.component('dashboard', Dashboard)

app.mount('#app')
