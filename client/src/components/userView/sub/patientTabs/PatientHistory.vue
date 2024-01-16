<script setup>
import { ref, computed } from 'vue'
import { usePatientStore } from '@/stores/patientStore'

const patientStore = usePatientStore()
const patient = computed(() => patientStore.patient)

const isFormActive = ref(false)
const editMode = ref(false)
const form = ref({
  chief_complaint: null,
  cheif_complaint_duration: null,
  hopi: null,
  past_medical_history: null,
  surgical_history: null,
  family_history: null,
  drug_history: null,
  allergy_history: null,
  social_history: null,
  history_gpd_g: null,
  history_gpd_p: null,
  history_gpd_a: null,
  history_gpd_d: null,
  history_menstrual: null,
  history_edd: null,
  history_lmp: null,
  history_gestational_age: null,
  note: null,
})

function clearForm() {
  editMode.value = false

  form.value = {
    patient_id: null,
    chief_complaint: null,
    cheif_complaint_duration: null,
    hopi: null,
    past_medical_history: null,
    surgical_history: null,
    family_history: null,
    drug_history: null,
    allergy_history: null,
    social_history: null,
    history_gpd_g: null,
    history_gpd_p: null,
    history_gpd_a: null,
    history_gpd_d: null,
    history_menstrual: null,
    history_edd: null,
    history_lmp: null,
    history_gestational_age: null,
    note: null,
  }
}

function submit() {
  form.value.patient_id = patient.value.id
}
</script>

<template>
  {{ patient.full_name }}
  <el-collapse
    accordion
    v-model="isFormActive"
  >
    <el-collapse-item
      :title="$t('Patient History Form')"
      :name="false"
    >
      <el-form
        :model="form"
        label-position="top"
      >
        <el-row :gutter="20">
          <el-col
            :xs="24"
            :sm="24"
          >
            <el-form-item :label="$t('Username')">
              <el-input
                v-model="form.username"
                :placeholder="$t('Username')"
              />
            </el-form-item>
          </el-col>

          <el-col
            :xs="24"
            :sm="24"
          >
            <el-form-item :label="$t('Name')">
              <el-input
                v-model="form.name"
                :placeholder="$t('Name')"
              />
            </el-form-item>
          </el-col>

          <el-col
            :xs="24"
            :sm="24"
          >
            <el-form-item :label="$t('Email')">
              <el-input
                v-model="form.email"
                :placeholder="$t('Email')"
              />
            </el-form-item>
          </el-col>

          <el-col
            :xs="24"
            :sm="24"
          >
            <el-form-item :label="$t('Password')">
              <el-input
                v-model="form.password"
                :placeholder="$t('Password')"
                show-password
              />
            </el-form-item>
          </el-col>

          <el-col
            :xs="24"
            class="text-end"
          >
            <el-button @click="clearForm()">
              {{ $t('Cancel') }}
            </el-button>

            <el-button
              color="#00BFA6"
              @click="submit()"
            >
              <span class="text-white">
                {{ $t('Save') }}
              </span>
            </el-button>
          </el-col>
        </el-row>
      </el-form>
    </el-collapse-item>
  </el-collapse>
</template>

<style scoped></style>
