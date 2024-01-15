import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/login',
      name: 'login',
      component: () => import('../components/LoginIndex.vue')
    },
    {
      path: '/patient-view',
      name: 'patient-view',
      component: () => import('../components/PatientViewIndex.vue')
    }
  ]
})

export default router
