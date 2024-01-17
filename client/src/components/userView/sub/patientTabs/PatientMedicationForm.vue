<script setup>
import { ref, computed } from 'vue'
import { usePatientStore } from '@/stores/patientStore'
import axios from 'axios'
import { ElMessage } from 'element-plus';

const patientStore = usePatientStore()
const patient = computed(() => patientStore.patient)

const patientMedicationForm = ref({
  description: null,
})

function submitForm() {
  axios
    .post(`patient/medication`, {
      description: patientMedicationForm.value.description,
      patient_id: patient.value.id,
    })
    .then(() => {
      patientStore.show(patient.value.code)
      ElMessage({
        message: 'Saved successfully',
        type: 'success',
      })
      clearForm()
    })
}

function clearForm() {
  patientMedicationForm.value = {
    patient_id: patientStore.patient.code,
    description: null,
  }
}
</script>
<template>
  <div class="font-bold text-lg text-sm-green border-b mb-4 py-2">
    {{ $t('Medications Form') }}
  </div>
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
            :rows="6"
            :placeholder="$t('Medication')"
            type="textarea"
          />
        </el-form-item>
      </el-col>
    </el-row>
    <el-row justify="end">
      <div>
        <el-form-item>
          <el-button
            type="primary"
            @click="submitForm"
            icon="plus"
          >
            {{ $t('Add') }}
          </el-button>
          <el-button
            icon="Close"
            @click="clearForm()"
          >
            {{ $t('Cancel') }}
          </el-button>
        </el-form-item>
      </div>
    </el-row>
  </el-form>
  <div class="font-bold text-lg text-sm-green border-b my-4 py-2">
    {{ $t('Patient Medications') }}
  </div>

  <el-table
    :data="patient.medications"
    style="width: 100%"
  >
    <el-table-column
      prop="description"
      :label="$t('Note')"
    />
    <el-table-column
      prop="created_at"
      :label="$t('Created At')"
    />
  </el-table>
</template>
<style scoped></style>
