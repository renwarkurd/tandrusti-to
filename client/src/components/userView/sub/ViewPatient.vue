<script setup>
import { onMounted, watch } from 'vue'
import { usePatientStore } from '@/stores/patientStore'
import { useRoute } from 'vue-router'
import PatientDiagnosisForm from './patientTabs/PatientDiagnosisForm.vue'
import PatientOperationForm from './patientTabs/PatientOperationForm.vue'
import PatientHistory from './patientTabs/PatientHistory.vue'
import PatientMedicationForm from './patientTabs/PatientMedicationForm.vue'
import PatientLaboratoryResultForm from './patientTabs/PatientLaboratoryResultForm.vue'
import PatientRadiologyResultForm from './patientTabs/PatientRadiologyResultForm.vue'
import PatientGeneralNoteForm from './patientTabs/PatientGeneralNoteForm.vue'

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
          <el-tab-pane :label="$t('Medication')"><patient-medication-form /></el-tab-pane>
          <el-tab-pane :label="$t('Diagnosis')"><patient-diagnosis-form /></el-tab-pane>
          <el-tab-pane :label="$t('Operation')"><patient-operation-form /></el-tab-pane>
          <el-tab-pane :label="$t('Laboratory Results')"><patient-laboratory-result-form /></el-tab-pane>
          <el-tab-pane :label="$t('Radiology Results')"><patient-radiology-result-form /></el-tab-pane>
          <el-tab-pane :label="$t('Physiotherapy')"></el-tab-pane>
          <el-tab-pane :label="$t('General Note')"><patient-general-note-form /></el-tab-pane>
        </el-tabs>
      </div>
    </el-col>
  </el-row>
</template>

<style lang="scss" scoped></style>
