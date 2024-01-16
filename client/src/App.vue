<script setup>
import { RouterView } from 'vue-router'
import { useAuthStore } from './stores/auth'
import { onMounted } from 'vue'
import axios from 'axios'
import { useI18n } from 'vue-i18n'

const authStore = useAuthStore()
const { locale } = useI18n()

onMounted(() => {
  locale.value = authStore.savedLocale
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
