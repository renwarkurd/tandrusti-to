<script setup>
import { RouterView } from 'vue-router'
import { useAuthStore } from './stores/auth'
import { onMounted } from 'vue'
import axios from 'axios'

const auth = useAuthStore()

onMounted(() => {
  if (auth.authUser && auth.authUser.id && auth.token.length) {
    axios.defaults.headers.common['Authorization'] = `Bearer ${auth.token}`
  }
})
</script>

<template>
  <RouterView />
</template>

<style scoped></style>
