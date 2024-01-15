<script setup>
import axios from 'axios'
import { onMounted } from 'vue'
import { ref } from 'vue'

const apiData = ref([])

onMounted(() => {
  getData()
})

function getData() {
  axios.get('provider').then((res) => {
    apiData.value = res.data
  })
}
</script>

<template>
  <div></div>
</template>

<style lang="scss" scoped></style>
