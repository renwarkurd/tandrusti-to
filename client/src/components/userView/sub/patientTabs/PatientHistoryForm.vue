<script setup>
import { ref, computed } from 'vue'
import { usePatientStore } from '@/stores/patientStore'
import axios from 'axios'
import { ElMessage } from 'element-plus'

const patientStore = usePatientStore()
const patient = computed(() => patientStore.patient)

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

  axios.post('patient/history', form.value).then(() => {
    patientStore.show(patient.value.code)
    clearForm()
    ElMessage({
      message: 'Saved successfully',
      type: 'success',
    })
  })
}
</script>

<template>
  <div
    style="max-height: 75vh; overflow-y: scroll; overflow-x: hidden"
    class="p-4"
  >
    <div class="font-bold text-lg text-sm-green border-b mb-4 py-2">
      {{ $t('Patient History Form') }}
    </div>

    <el-form
      :model="form"
      label-position="top"
    >
      <el-row :gutter="20">
        <el-col
          :xs="24"
          :sm="24"
          :md="12"
        >
          <el-form-item label="Chief Complaint">
            <el-input
              v-model="form.chief_complaint"
              placeholder="Chief Complaint"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
        >
          <el-form-item label="Chief Complaint Duration">
            <el-input
              v-model="form.cheif_complaint_duration"
              placeholder="Chief Complaint Duration"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
        >
          <el-form-item label="H.O.P.I">
            <el-input
              v-model="form.hopi"
              placeholder="H.O.P.I"
              :rows="2"
              type="textarea"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
        >
          <el-form-item label="Medical History">
            <el-input
              v-model="form.past_medical_history"
              placeholder="Medical History"
              :rows="2"
              type="textarea"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
        >
          <el-form-item label="Surgical History">
            <el-input
              v-model="form.surgical_history"
              placeholder="Surgical History"
              :rows="2"
              type="textarea"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
        >
          <el-form-item label="Family History">
            <el-input
              v-model="form.family_history"
              placeholder="Family History"
              :rows="2"
              type="textarea"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
        >
          <el-form-item label="Drug History">
            <el-input
              v-model="form.drug_history"
              placeholder="Drug History"
              :rows="2"
              type="textarea"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
        >
          <el-form-item label="Allergy History">
            <el-input
              v-model="form.allergy_history"
              placeholder="Allergy History"
              :rows="2"
              type="textarea"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
        >
          <el-form-item label="Social History">
            <el-input
              v-model="form.social_history"
              placeholder="Social History"
              :rows="2"
              type="textarea"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
        >
          <el-form-item label="Menstrual">
            <el-input
              v-model="form.history_menstrual"
              placeholder="Menstrual"
              :rows="2"
              type="textarea"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
          :lg="2"
          style="align-self: center"
        >
          G.P.A.D
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
          :lg="5"
        >
          <el-form-item label="G">
            <el-input-number
              v-model="form.history_gpd_g"
              style="width: 100%"
              placeholder="G"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
          :lg="5"
        >
          <el-form-item label="P">
            <el-input-number
              v-model="form.history_gpd_p"
              style="width: 100%"
              placeholder="P"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
          :lg="6"
        >
          <el-form-item label="A">
            <el-input-number
              v-model="form.history_gpd_a"
              style="width: 100%"
              placeholder="A"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
          :lg="6"
        >
          <el-form-item label="D">
            <el-input-number
              v-model="form.history_gpd_a"
              style="width: 100%"
              placeholder="D"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
        >
          <el-form-item label="History Edd">
            <el-date-picker
              v-model="form.history_edd"
              type="date"
              value-format="YYYY-MM-DD"
              style="width: 100%"
              placeholder="History Edd"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
        >
          <el-form-item label="History Lmp">
            <el-date-picker
              v-model="form.history_lmp"
              type="date"
              value-format="YYYY-MM-DD"
              style="width: 100%"
              placeholder="History Lmp"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
        >
          <el-form-item label="History Gestational Age">
            <el-input
              v-model="form.history_gestational_age"
              rows="2"
              type="textarea"
              placeholder="History Gestational Age"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
        >
          <el-form-item label="Note">
            <el-input
              v-model="form.note"
              rows="2"
              type="textarea"
              placeholder="Note"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          class="text-end"
        >
          <el-button
            type="primary"
            icon="Plus"
            @click="submit()"
          >
            {{ $t('Add') }}
          </el-button>

          <el-button
            icon="Close"
            @click="clearForm()"
          >
            {{ $t('Cancel') }}
          </el-button>
        </el-col>
      </el-row>
    </el-form>

    <div class="font-bold text-lg text-sm-green border-b my-4 py-2">
      {{ $t('Patient Histories') }}
    </div>

    <el-table
      :data="patient.histories"
      style="width: 100%"
    >
      <el-table-column
        prop="chief_complaint"
        label="Chief Complaint"
        width="200"
      />
      <el-table-column
        prop="cheif_complaint_duration"
        label="Chief Complaint Duration"
        width="200"
      />
      <el-table-column
        prop="hopi"
        label="H.O.P.I"
        width="200"
      />
      <el-table-column
        prop="past_medical_history"
        label="Medical History"
        width="200"
      />
      <el-table-column
        prop="surgical_history"
        label="Surgical History"
        width="200"
      />
      <el-table-column
        prop="family_history"
        label="Family History"
        width="200"
      />
      <el-table-column
        prop="drug_history"
        label="Drug History"
        width="200"
      />
      <el-table-column
        prop="allergy_history"
        label="Allergy History"
        width="200"
      />
      <el-table-column
        prop="social_history"
        label="Social History"
        width="200"
      />
      <el-table-column
        prop="history_menstrual"
        label="Menstrual"
        width="200"
      />
      <el-table-column
        prop="history_gpd_g"
        label="G.P.D )"
      />
      <el-table-column
        prop="history_gpd_p"
        label="G.P.D )"
      />
      <el-table-column
        prop="history_gpd_a"
        label="G.P.D )"
      />
      <el-table-column
        prop="history_gpd_d"
        label="G.P.D )"
      />
      <el-table-column
        prop="history_edd"
        label="History Ed)"
        width="120"
      />
      <el-table-column
        prop="history_lmp"
        label="History Lm)"
        width="120"
      />
      <el-table-column
        prop="history_gestational_age"
        label="History Gestational Age"
        width="120"
      />
      <el-table-column
        prop="note"
        label="Note"
        width="200"
      />
      <el-table-column
        prop="created_at"
        label="Created At"
        width="120"
      />
    </el-table>
  </div>
</template>

<style scoped></style>
