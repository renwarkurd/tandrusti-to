<script setup>
import PatientMedication from '@/components/userView/sub/patientTabs/PatientMedication.vue'
import axios from 'axios'
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'

const route = useRoute()

const patient = ref({})

onMounted(() => {
  getPatient()
})

function getPatient() {
  axios.get(`patient/${route.params.code}`).then((res) => {
    patient.value = res.data
  })
}
</script>

<template>
  <el-row justify="center">
    <el-col
      :xs="24"
      :sm="24"
      :md="16"
      :lg="14"
      :xl="10"
    >
      <div class="bg-white border rounded-lg p-4">
        <el-tabs tab-position="left">
          <el-tab-pane :label="$t('Patient History')"></el-tab-pane>
          <el-tab-pane :label="$t('Medication')"><patient-medication /></el-tab-pane>
          <el-tab-pane :label="$t('Diagnosis')"></el-tab-pane>
          <el-tab-pane :label="$t('Operation')"></el-tab-pane>
          <el-tab-pane :label="$t('Laboratory Results')"></el-tab-pane>
          <el-tab-pane :label="$t('Radiology Results')"></el-tab-pane>
          <el-tab-pane :label="$t('Physiotherapy')"></el-tab-pane>
          <el-tab-pane :label="$t('General Note')"></el-tab-pane>
        </el-tabs>
      </div>
    </el-col>
  </el-row>
</template>

<style lang="scss" scoped></style>
