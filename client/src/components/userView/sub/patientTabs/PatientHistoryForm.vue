<script setup>
import { ref, computed } from 'vue'
import { usePatientStore } from '@/stores/patientStore'

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
}
</script>

<template>
  <div style="max-height: 80vh; overflow-y: scroll">
    <div class="font-medium text-base border-b mb-4 py-2">
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
          <el-form-item :label="$t('Chief Complaint')">
            <el-input
              v-model="form.chief_complaint"
              :placeholder="$t('Chief Complaint')"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
        >
          <el-form-item :label="$t('Chief Complaint Duration')">
            <el-input
              v-model="form.cheif_complaint_duration"
              :placeholder="$t('Chief Complaint Duration')"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
        >
          <el-form-item :label="$t('H.O.P.I')">
            <el-input
              v-model="form.hopi"
              :placeholder="$t('H.O.P.I')"
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
          <el-form-item :label="$t('Medical History')">
            <el-input
              v-model="form.past_medical_history"
              :placeholder="$t('Medical History')"
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
          <el-form-item :label="$t('Surgical History')">
            <el-input
              v-model="form.surgical_history"
              :placeholder="$t('Surgical History')"
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
          <el-form-item :label="$t('Family History')">
            <el-input
              v-model="form.family_history"
              :placeholder="$t('Family History')"
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
          <el-form-item :label="$t('Drug History')">
            <el-input
              v-model="form.drug_history"
              :placeholder="$t('Drug History')"
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
          <el-form-item :label="$t('Allergy History')">
            <el-input
              v-model="form.allergy_history"
              :placeholder="$t('Allergy History')"
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
          <el-form-item :label="$t('Social History')">
            <el-input
              v-model="form.social_history"
              :placeholder="$t('Social History')"
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
          <el-form-item :label="$t('Menstrual')">
            <el-input
              v-model="form.history_menstrual"
              :placeholder="$t('Menstrual')"
              :rows="2"
              type="textarea"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
          :lg="6"
        >
          <el-form-item :label="$t('G.P.D G')">
            <el-input-number
              v-model="form.history_gpd_g"
              style="width: 100%"
              :placeholder="$t('G.P.D G')"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
          :lg="6"
        >
          <el-form-item :label="$t('G.P.D P')">
            <el-input-number
              v-model="form.history_gpd_p"
              style="width: 100%"
              :placeholder="$t('G.P.D P')"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
          :lg="6"
        >
          <el-form-item :label="$t('G.P.D A')">
            <el-input-number
              v-model="form.history_gpd_a"
              style="width: 100%"
              :placeholder="$t('G.P.D A')"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
          :lg="6"
        >
          <el-form-item :label="$t('G.P.D D')">
            <el-input-number
              v-model="form.history_gpd_a"
              style="width: 100%"
              :placeholder="$t('G.P.D D')"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
        >
          <el-form-item :label="$t('History Edd')">
            <el-date-picker
              v-model="form.history_edd"
              type="date"
              style="width: 100%"
              :placeholder="$t('History E.D.D')"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
        >
          <el-form-item :label="$t('History L.M.P')">
            <el-date-picker
              v-model="form.history_lmp"
              type="date"
              style="width: 100%"
              :placeholder="$t('History L.M.P')"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
        >
          <el-form-item :label="$t('History Gestational Age')">
            <el-input
              v-model="form.history_gestational_age"
              rows="2"
              type="textarea"
              :placeholder="$t('History Gestational Age')"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          :sm="24"
          :md="12"
        >
          <el-form-item :label="$t('Note')">
            <el-input
              v-model="form.note"
              rows="2"
              type="textarea"
              :placeholder="$t('Note')"
            />
          </el-form-item>
        </el-col>

        <el-col
          :xs="24"
          class="text-end"
        >
          <el-button
            color="#00BFA6"
            @click="submit()"
          >
            <template #icon>
              <el-icon color="white"><Check /></el-icon>
            </template>
            <span class="text-white">
              {{ $t('Save') }}
            </span>
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

    <div class="font-medium text-base border-b my-4 py-2">
      {{ $t('Patient Histories') }}
    </div>
  </div>
</template>

<style scoped></style>
