import { defineStore } from 'pinia'
import axios from 'axios'
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { useI18n } from 'vue-i18n'

export const useAuthStore = defineStore('authStore', () => {
  const router = useRouter()
  const { locale } = useI18n()
  
  const authUser = ref({})
  const token = ref(null)
  const savedLocale = ref('ckb')

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

  function changeLocale(data) {
    locale.value = data
    savedLocale.value = data
  }

  return {
    authUser,
    token,
    locale,
    savedLocale,
    login,
    logout,
    getAuthUser,
    changeLocale,
  }
}, { persist: true })
