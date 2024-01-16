<script setup>
import { ref, computed } from 'vue'
import { usePatientStore } from '@/stores/patientStore'
import axios from 'axios'

const patientStore = usePatientStore()
const patient = computed(() => patientStore.patient)

const patientLaboratoryResultForm = ref({
  description: null,
})

function addLaboratoryResult() {
  axios
    .post(`patient/laboratory`, {
      description: patientLaboratoryResultForm.value.description,
      patient_id: patientStore.patient.id,
    })
    .then(() => {
      resetPatientLaboratoryResultForm()
    })
}

function resetPatientLaboratoryResultForm() {
  patientLaboratoryResultForm.value = {
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
        <el-form-item :label="$t('Laboratory Results')">
          <el-input
            v-model="patientLaboratoryResultForm.description"
            maxlength="600"
            :rows="6"
            :placeholder="$t('Laboratory Results')"
            show-word-limit
            type="textarea"
          />
        </el-form-item>
      </el-col>
    </el-row>
    <el-row justify="end">
      <el-col :span="3">
        <el-form-item>
          <el-button type="primary"> Add </el-button>
        </el-form-item>
      </el-col>
    </el-row>
  </el-form>
</template>
<style scoped></style>
