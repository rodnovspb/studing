import 'bootstrap/dist/css/bootstrap.min.css'
import globalComponents from "@/components/global/index.js";

import { createApp } from 'vue'
import App from './App.vue'

const app = createApp(App);

app.use(globalComponents)

app.mount('#app')