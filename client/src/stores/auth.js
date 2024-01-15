import { ref, computed } from 'vue'
import { defineStore } from 'pinia'

export const useAuthStore = defineStore('auth', () => {
  const authUser = ref({})
  const doubleCount = computed(() => authUser.value * 2)
  function increment() {
    authUser.value++
  }

  return { authUser, doubleCount, increment }
})
