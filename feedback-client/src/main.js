import { createApp } from 'vue';
import App from './App.vue';
import { store } from './state/store';

const app = createApp(App);

app.use(store); // Подключите Vuex хранилище к приложению
app.mount('#app');
