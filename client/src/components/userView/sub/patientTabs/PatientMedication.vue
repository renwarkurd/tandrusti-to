<script setup>
import { ref } from 'vue'

const patientForm = ref({
  patient_id: null,
  description: null,
})
</script>
<template>
  <el-form
    label-position="top"
    label-width="100px"
    style="max-width: 460px"
  >
    <el-form-item label="Patient ID">
      <el-input v-model="patientForm.patient_id" />
    </el-form-item>
    <el-form-item label="Description">
      <!-- <el-input v-model="patientForm.description" /> -->
      <el-input
        v-model="patientForm.description"
        maxlength="600"
        placeholder="Description..."
        show-word-limit
        type="textarea"
      />
    </el-form-item>
  </el-form>
</template>
<style scoped></style>
