import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler';
import Example from "@/components/Example.vue";
import Hello from "@/components/Hello.vue";

const app = createApp({});

app.component('example', Example);
app.component('hello', Hello);


app.mount('#app');

