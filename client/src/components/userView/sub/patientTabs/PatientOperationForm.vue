<script setup>
import { ref, onMounted, computed } from 'vue'
import { usePatientStore } from '@/stores/patientStore'
import axios from 'axios'

const patientStore = usePatientStore()
const patient = computed(() => patientStore.patient)

const patientOperationForm = ref({
  description: null,
})

function addOperation() {
  axios
    .post(`patient/operation`, {
      description: patientOperationForm.value.description,
      patient_id: patientStore.patient.id,
    })
    .then((result) => {
      resetPatientOperationForm()
    })
}

function resetPatientOperationForm() {
  patientOperationForm.value = {
    patient_id: patientStore.patient.code,
    description: null,
  }
}
</script>
<template>
  {{ patient.full_name }}
  <el-divider />
  <el-form
    label-position="top"
    label-width="100px"
    style="max-width: 460px"
  >
    <el-row>
      <el-col>
        <el-form-item label="Description">
          <el-input
            v-model="patientOperationForm.description"
            maxlength="600"
            :rows="6"
            :placeholder="$t('Operation') + '...'"
            show-word-limit
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
            @click="addOperation"
          >
            Add
          </el-button>
        </el-form-item>
      </el-col>
    </el-row>
  </el-form>
</template>
<style scoped></style>
