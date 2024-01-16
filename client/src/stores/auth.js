import { defineStore } from 'pinia'
import axios from 'axios'

export const useAuthStore = defineStore('authStore', {
  state: () => {
    return {
      authUser: {},
      token: null,
    }
  },

  actions: {
    async login(form) {
      await axios.post('login', form).then((res) => {
        this.authUser = res.data.user
        this.token = res.data.token
        axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`
      })
    },

    async logout() {
      this.authUser = {}
      this.token = null
      await axios.post('logout')
      delete axios.defaults.headers.common['Authorization']
      window.location.href = '/'
    },

    async getAuthUser() {
      await axios.get('auth').then((res) => {
        this.authUser = res.data
      })
    },
  },

  persist: true,
})
