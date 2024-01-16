<script setup>
import PatientMedication from '@/components/userView/sub/patientTabs/PatientMedication.vue'
import PatientHistory from './patientTabs/PatientHistory.vue'
import { onMounted } from 'vue'
import { usePatientStore } from '@/stores/patientStore'
import { useRoute } from 'vue-router'
import { watch } from 'vue'

const patientStore = usePatientStore()
const route = useRoute()

onMounted(async () => {
  patientStore.show(route.params.code)
})

watch(route, () => {
  patientStore.show(route.params.code)
})
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
          <el-tab-pane :label="$t('Patient History')"><patient-history /></el-tab-pane>
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
