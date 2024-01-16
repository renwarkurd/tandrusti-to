<script setup>
import { RouterView } from 'vue-router'
import { useAuthStore } from './stores/auth'
import { onMounted } from 'vue'
import axios from 'axios'

const authStore = useAuthStore()

onMounted(() => {
  if (authStore.authUser && authStore.authUser.id && authStore.token.length) {
    axios.defaults.headers.common['Authorization'] = `Bearer ${authStore.token}`
    authStore.getAuthUser()
  }
})
</script>

<template>
  <RouterView />
</template>

<style scoped></style>
