import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'login',
      component: () => import('../components/LoginIndex.vue')
    },
    {
      path: '/home',
      name: 'home',
      component: () => import('../components/HomeIndex.vue')
    }
  ]
})

export default router
