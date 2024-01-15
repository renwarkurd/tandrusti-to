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
      component: () => import('../components/patientView/PatientViewIndex.vue')
    },
    {
      path: '/user-view',
      name: 'user-view',
      component: () => import('../components/userView/userViewIndex.vue'),
      children: [
        {
          path: 'add-patient',
          name: 'add-patient',
          component: () => import('@/components/userView/sub/AddPatient.vue')
        }
      ]
    }
  ]
})

export default router
