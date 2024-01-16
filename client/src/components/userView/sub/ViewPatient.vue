<script setup>
import { onMounted, watch, computed } from 'vue'
import { usePatientStore } from '@/stores/patientStore'
import { useRoute } from 'vue-router'
import PatientDiagnosisForm from './patientTabs/PatientDiagnosisForm.vue'
import PatientOperationForm from './patientTabs/PatientOperationForm.vue'
import PatientHistoryForm from './patientTabs/PatientHistoryForm.vue'
import PatientMedicationForm from './patientTabs/PatientMedicationForm.vue'
import PatientLaboratoryResultForm from './patientTabs/PatientLaboratoryResultForm.vue'
import PatientRadiologyResultForm from './patientTabs/PatientRadiologyResultForm.vue'
import PatientGeneralNoteForm from './patientTabs/PatientGeneralNoteForm.vue'
import PatientPhysiotherapyForm from './patientTabs/PatientPhysiotherapyForm.vue'
import { useGetCalculatedAge } from '@/composables/helpers.js'

const patientStore = usePatientStore()
const route = useRoute()

const patient = computed(() => patientStore.patient)

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
      :lg="16"
      :xl="14"
    >
      <el-row>
        <el-col
          v-if="patient.id"
          :xs="24"
        >
          <div
            class="bg-white border rounded-lg p-4 mb-2"
            style="direction: rtl"
          >
            <div class="flex justify-between mb-2">
              <div>
                <b>{{ $t('Full Name') }}: </b> {{ patient.full_name }}
              </div>

              <div>
                <b>{{ $t('Code Type') }}: </b> {{ patient.code_type.name }}
              </div>

              <div>
                <b>{{ $t('Code') }}: </b> {{ patient.code }}
              </div>
            </div>
            <div class="flex justify-between">
              <div>
                <b>{{ $t('Contact 1') }}: </b> {{ patient.contact_1 }}
              </div>

              <div>
                <b>{{ $t('Age') }}: </b> {{ useGetCalculatedAge(patient.calculated_age) }}
              </div>

              <div>
                <b>{{ $t('Gender') }}: </b> {{ patient.gender == 1 ? $t('Male') : $t('Female') }}
              </div>
            </div>
          </div>
        </el-col>

        <el-col :xs="24">
          <div class="bg-white border rounded-lg p-4">
            <el-tabs tab-position="left">
              <el-tab-pane :label="$t('Patient History')"><patient-history-form /></el-tab-pane>
              <el-tab-pane :label="$t('Medication')"><patient-medication-form /></el-tab-pane>
              <el-tab-pane :label="$t('Diagnosis')"><patient-diagnosis-form /></el-tab-pane>
              <el-tab-pane :label="$t('Operation')"><patient-operation-form /></el-tab-pane>
              <el-tab-pane :label="$t('Laboratory Results')"><patient-laboratory-result-form /></el-tab-pane>
              <el-tab-pane :label="$t('Radiology Results')"><patient-radiology-result-form /></el-tab-pane>
              <el-tab-pane :label="$t('Physiotherapy')"><patient-physiotherapy-form /></el-tab-pane>
              <el-tab-pane :label="$t('General Notes')"><patient-general-note-form /></el-tab-pane>
            </el-tabs></div
        ></el-col>
      </el-row>
    </el-col>
  </el-row>
</template>

<style lang="scss" scoped></style>
