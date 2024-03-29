import { createRouter, createWebHashHistory } from 'vue-router'

const router = createRouter({
  history: createWebHashHistory(),
  routes: [
    {
      path: '/',
      name: 'welcome',
      component: () => import('../components/LoginIndex.vue')
    },
    {
      path: '/user-login',
      name: 'user-login',
      component: () => import('../components/userView/UserLogin.vue')
    },
    {
      path: '/patient-view/:code',
      name: 'patient-view',
      component: () => import('../components/patientView/PatientViewIndex.vue')
    },
    {
      path: '/user-view',
      name: 'user-view',
      component: () => import('../components/userView/UserViewIndex.vue'),
      children: [
        {
          path: 'add-patient',
          name: 'add-patient',
          component: () => import('@/components/userView/sub/AddPatient.vue')
        },
        {
          path: 'view-patient/:code',
          name: 'view-patient',
          params: {
            code: null
          },
          component: () => import('@/components/userView/sub/ViewPatient.vue')
        },
        {
          path: 'provider-list',
          name: 'provider-list',
          component: () => import('@/components/userView/sub/ProviderList.vue')
        },
      ]
    }
  ]
})

export default router
