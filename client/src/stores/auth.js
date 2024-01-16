import { defineStore } from 'pinia'
import axios from 'axios'
import { ref } from 'vue'
import { useRouter } from 'vue-router'

export const useAuthStore = defineStore('authStore', () => {
  const router = useRouter()

  const authUser = ref({})
  const token = ref(null)

  async function login(form) {
    await axios.post('login', form).then((res) => {
      authUser.value = res.data.user
      token.value = res.data.token
      axios.defaults.headers.common['Authorization'] = `Bearer ${token.value}`
    })
  }

  async function logout() {
    authUser.value = {}
    token.value = null
    await axios.post('logout')
    delete axios.defaults.headers.common['Authorization']
    router.push('/')
  }

  async function getAuthUser() {
    await axios.get('auth').then((res) => {
      authUser.value = res.data
    })
  }

  return {
    authUser,
    token,
    login,
    logout,
    getAuthUser,
  }
}, { persist: true })
