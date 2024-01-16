<script setup>
import { ref, computed } from 'vue'
import { usePatientStore } from '@/stores/patientStore'
import axios from 'axios'

const patientStore = usePatientStore()
const patient = computed(() => patientStore.patient)

const patientLaboratoryResultForm = ref({
  description: null,
})

function submitForm() {
  axios
    .post(`patient/laboratory`, {
      description: patientLaboratoryResultForm.value.description,
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
  patientLaboratoryResultForm.value = {
    patient_id: patientStore.patient.code,
    description: null,
  }
}
</script>
<template>
  <div class="font-bold text-lg text-sm-green border-b mb-4 py-2">
    {{ $t('Laboratory Results Form') }}
  </div>
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
            :rows="6"
            :placeholder="$t('Laboratory Results')"
            type="textarea"
          />
        </el-form-item>
      </el-col>
    </el-row>
    <el-row justify="end">
      <el-col :span="13">
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
      </el-col>
    </el-row>
  </el-form>
  <div class="font-bold text-lg text-sm-green border-b my-4 py-2">
    {{ $t('Patient Laboratory Result') }}
  </div>

  <el-table
    :data="patient.laboratory_results"
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
