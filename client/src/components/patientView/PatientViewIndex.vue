<script setup>
import PatientBio from './sub/PatientBio.vue'
import PatientHistory from './sub/PatientHistory.vue'
import PatientMedication from './sub/PatientMedication.vue'
import PatientOperation from './sub/PatientOperation.vue'
import PatientDiagnosis from './sub/PatientDiagnosis.vue'
import PatientPhysiotherapy from './sub/PatientPhysiotherapy.vue'
import PatientGeneral from './sub/PatientGeneral.vue'
import PatientLaboratory from './sub/PatientLaboratory.vue'
import PatientRadiology from './sub/PatientRadiology.vue'
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
  <div
    class="p-3"
    v-if="patient.id"
  >
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
        <div
          style="height: 95vh; overflow-y: scroll"
          class="p-4"
        >
          <PatientHistory :items="patient.histories" />
          <el-row :gutter="10">
            <el-col
              :xs="24"
              :sm="24"
              :md="12"
              :lg="12"
              :xl="12"
            >
              <PatientDiagnosis :items="patient.diagnosis" />
            </el-col>
            <el-col
              :xs="24"
              :sm="24"
              :md="12"
              :lg="12"
              :xl="12"
            >
              <PatientOperation :items="patient.operations" />
            </el-col>
          </el-row>
          <el-row :gutter="10">
            <el-col
              :xs="24"
              :sm="24"
              :md="12"
              :lg="12"
              :xl="12"
            >
              <PatientPhysiotherapy :items="patient.physiotherapies" />
            </el-col>
            <el-col
              :xs="24"
              :sm="24"
              :md="12"
              :lg="12"
              :xl="12"
            >
              <PatientMedication :items="patient.medications" />
            </el-col>
          </el-row>
          <el-row>
            <el-col
              :xs="24"
              :sm="24"
              :md="24"
              :lg="24"
              :xl="24"
            >
              <PatientGeneral :items="patient.general_notes" />
            </el-col>
          </el-row>
           <el-row :gutter="10">
            <el-col
              :xs="24"
              :sm="24"
              :md="12"
              :lg="12"
              :xl="12"
            >
              <PatientLaboratory :items="patient.laboratory_results" />
            </el-col>
            <el-col
              :xs="24"
              :sm="24"
              :md="12"
              :lg="12"
              :xl="12"
            >
              <PatientRadiology :items="patient.radiology_results" />
            </el-col>
          </el-row>
        </div>
      </el-col>
    </el-row>
  </div>
</template>

<style lang="scss" scoped></style>
