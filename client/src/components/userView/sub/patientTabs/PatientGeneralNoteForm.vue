<script setup>
import { ref, onMounted, computed } from 'vue'
import { usePatientStore } from '@/stores/patientStore'
import axios from 'axios'

const patientStore = usePatientStore()
const patient = computed(() => patientStore.patient)

const patientGeneralNoteForm = ref({
  description: null,
})

function addGeneralNote() {
  axios
    .post(`patient/general`, {
      description: patientGeneralNoteForm.value.description,
      patient_id: patientStore.patient.id,
    })
    .then((result) => {
      resetPatientGeneralNoteForm()
    })
}

function resetPatientGeneralNoteForm() {
  patientGeneralNoteForm.value = {
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
            v-model="patientGeneralNoteForm.description"
            maxlength="600"
            :rows="6"
            :placeholder="$t('General Notes') + '...'"
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
            @click="addGeneralNote"
          >
            Add
          </el-button>
        </el-form-item>
      </el-col>
    </el-row>
  </el-form>
</template>
<style scoped></style>
