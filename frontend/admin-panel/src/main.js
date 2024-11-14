import { createApp } from 'vue'
import App from './App.vue'
import axios from 'axios'
import app from "@/App.vue";

createApp(App).mount('#app')
axios.defaults.baseURL = 'http://your-laravel-api-url/api';
app.config.globalProperties.$axios = axios;

app.mount('#app')