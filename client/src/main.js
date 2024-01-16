import './assets/main.css'
import { createApp } from 'vue'
import pinia from './plugins/pinia'
import ElementPlus from 'element-plus'
import * as ElementPlusIconsVue from '@element-plus/icons-vue'
import 'element-plus/dist/index.css'
import App from './App.vue'
import router from './router'
import i18n from './plugins/i18n'
import './plugins/axios'

const app = createApp(App)

app.use(ElementPlus)
app.use(pinia)
app.use(router)
app.use(i18n)

for (const [key, component] of Object.entries(ElementPlusIconsVue)) {
  app.component(key, component)
}

app.mount('#app')
