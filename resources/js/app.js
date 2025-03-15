import { createApp } from "vue";
import router from "./router";
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.bundle.min.js'
import axios from 'axios';

import App from "./App.vue";

createApp(App).use(router).mount("#app");

axios.defaults.withCredentials = true; // Necessário para autenticação CSRF em Laravel
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
axios.defaults.baseURL = 'http://127.0.0.1:8000';
