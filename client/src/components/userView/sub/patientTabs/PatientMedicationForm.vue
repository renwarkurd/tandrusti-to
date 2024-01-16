<script setup>
import { ref, computed } from 'vue'
import { usePatientStore } from '@/stores/patientStore'
import axios from 'axios'

const patientStore = usePatientStore()

const patientMedicationForm = ref({
  description: null,
})

const patient = computed(() => patientStore.patient)

function addMedication() {
  axios
    .post(`patient/medication`, {
      description: patientMedicationForm.value.description,
      patient_id: patientStore.patient.id,
    })
    .then(() => {
      resetPatientMedicationForm()
    })
}

function resetPatientMedicationForm() {
  patientMedicationForm.value = {
    patient_id: patientStore.patient.code,
    description: null,
  }
}
</script>
<template>
  <el-divider />
  <el-form
    label-position="top"
    label-width="100px"
    style="max-width: 460px"
  >
    <el-row>
      <el-col>
        <el-form-item :label="$t('Medication')">
          <el-input
            v-model="patientMedicationForm.description"
            maxlength="600"
            :rows="6"
            show-word-limit
            :placeholder="$t('Medication')"
            type="textarea"
          />
        </el-form-item>
      </el-col>
    </el-row>
    <el-row justify="end">
      <el-col :span="3">
        <el-form-item>
          <el-button
            type="primary"
            @click="addMedication"
          >
            Add
          </el-button>
        </el-form-item>
      </el-col>
    </el-row>
  </el-form>
</template>
<style scoped></style>
