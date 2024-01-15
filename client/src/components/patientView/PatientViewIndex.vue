<script setup>
import PatientBio from './sub/PatientBio.vue'
import PatientHistory from './sub/PatientHistory.vue'
import PatientMedication from './sub/PatientMedication.vue'
import PatientDiagnosis from './sub/PatientDiagnosis.vue'
import { onMounted, ref } from 'vue'
import axios from 'axios'
import { useRoute } from 'vue-router'
import router from '@/router'

const route = useRoute()
const patient = ref({})

onMounted(() => {
  axios
    .get('patient/' + route.params.code)
    .then((response) => (patient.value = response.data))
    .catch(() => router.push({ name: 'welcome' }))
})
</script>

<template>
  <div class="p-3" v-if="patient.id">
    <el-row :gutter="20">
      <!-- patient bio -->
      <el-col
        :xs="24"
        :sm="12"
        :md="8"
        :lg="8"
        :xl="8"
      >
        <PatientBio :patient="patient" />
      </el-col>

      <!-- other data -->
      <el-col
        :xs="24"
        :sm="12"
        :md="8"
        :lg="16"
        :xl="16"
      >
        <div style="height: 100vh; overflow-y: scroll">
          <PatientHistory />

          <PatientMedication />

          <PatientDiagnosis />
        </div>
      </el-col>
    </el-row>
  </div>
</template>

<style lang="scss" scoped></style>
