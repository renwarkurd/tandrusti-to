<script setup>
import { ref } from 'vue'
import { usePatientStore } from '@/stores/patientStore'

const patientStore = usePatientStore()

const patientForm = ref({
  patient_id: patientStore.patient.code,
  description: null,
})
</script>
<template>
  <el-form
    label-position="top"
    label-width="100px"
    style="max-width: 460px"
  >
    <el-row>
      <el-col>
        <el-form-item label="Description">
          <el-input
            v-model="patientForm.description"
            maxlength="600"
            :rows="6"
            placeholder=""
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
            color="blue"
          >
            Add
          </el-button>
        </el-form-item>
      </el-col>
    </el-row>
  </el-form>
</template>
<style scoped></style>
