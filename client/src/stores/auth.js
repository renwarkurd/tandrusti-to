import { defineStore } from 'pinia'
import axios from 'axios'

export const useAuthStore = defineStore('auth', {
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
      await axios.post('logout').then(() => {
        this.authUser = {}
        this.token = null
        delete axios.defaults.headers.common['Authorization']
      })
    },
  },

  persist: true,
})
