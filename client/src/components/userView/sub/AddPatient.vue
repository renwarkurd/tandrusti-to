<script setup>
import { ref, computed, onMounted } from 'vue'
import { useBaseDataStore } from '@/stores/baseDataStore.js'
import axios from 'axios'

const baseDataStore = useBaseDataStore()

const cities = computed(() => baseDataStore.cities)
const code_types = computed(() => baseDataStore.code_types)
const bloodGroups = computed(() => baseDataStore.bloodGroups)

const shortcuts = [
  {
    text: 'Today',
    value: new Date(),
  },
]

const patientForm = ref({
  code: null,
  code_type: null,

  first_name: null,
  middle_name: null,
  last_name: null,

  gender: null,

  dob_year: null,
  dob_month: null,
  dob_day: null,

  city_id: null,
  address: null,

  contact_1: null,
  contact_2: null,

  blood_group: null,

  occupation: null,
  marital_status: null,

  spouse_fullname: null,
  spouse_dob: null,
  spouse_contact: null,
  spouse_occupation: null,
})

function submit() {
  axios.post('patient', patientForm.value).then(() => {
    console.log('send and stored successfully')
  })
}
</script>

<template>
  <el-row justify="center">
    <el-col
      :xs="24"
      :sm="20"
      :md="16"
      :lg="16"
    >
      <div class="bg-white border rounded p-4">
        <el-form
          class="demo-form-inline"
          label-width="100px"
          label-position="top"
          size="large"
        >
          <el-row :gutter="16">
            <el-col :span="3">
              <el-form-item label="ID type">
                <el-select v-model="patientForm.code_type">
                  <el-option
                    v-for="item in code_types"
                    :key="item.id"
                    :label="item.name"
                    :value="item.id"
                  />
                </el-select>
              </el-form-item>
            </el-col>
            <el-col :span="21">
              <el-form-item label="ID Code">
                <el-input v-model="patientForm.code" />
              </el-form-item>
            </el-col>
          </el-row>
          <el-row :gutter="16">
            <el-col :span="4">
              <el-form-item label="First Name">
                <el-input v-model="patientForm.first_name" />
              </el-form-item>
            </el-col>
            <el-col :span="4">
              <el-form-item label="Middle Name">
                <el-input v-model="patientForm.middle_name" />
              </el-form-item>
            </el-col>
            <el-col :span="4">
              <el-form-item label="Last Name">
                <el-input v-model="patientForm.last_name" />
              </el-form-item>
            </el-col>
            <el-col :span="4">
              <el-form-item label="Gender">
                <el-radio-group
                  v-model="patientForm.gender"
                  class="ml-4"
                >
                  <el-radio label="0">Female</el-radio>
                  <el-radio label="1">Male</el-radio>
                </el-radio-group>
              </el-form-item>
            </el-col>
            <el-col :span="7">
              <el-form-item label="Date of birth">
                <el-input-number
                  :controls="false"
                  style="width: 100px; margin-right: 4px; margin-left: 4px"
                  v-model="patientForm.dob_year"
                  min="1900"
                  max="2100"
                />
                <span class="text-2xl">/</span>
                <el-input-number
                  :controls="false"
                  style="width: 100px; margin-right: 4px; margin-left: 4px"
                  v-model="patientForm.dob_month"
                  min="1"
                  max="12"
                />
                <span class="text-2xl">/</span>
                <el-input-number
                  :controls="false"
                  style="width: 100px; margin-right: 5px; margin-left: 4px"
                  v-model="patientForm.dob_day"
                  min="1"
                  max="31"
                />
              </el-form-item>
            </el-col>
          </el-row>
          <el-divider />
          <el-row :gutter="16">
            <el-col :span="8">
              <el-form-item label="City">
                <el-select v-model="patientForm.city_id">
                  <el-option
                    v-for="item in cities"
                    :key="item.id"
                    :label="item.name"
                    :value="item.id"
                  />
                </el-select>
              </el-form-item>
            </el-col>
            <el-col :span="8">
              <el-form-item label="Address">
                <el-input v-model="patientForm.address" />
              </el-form-item>
            </el-col>
            <el-col :span="8">
              <el-form-item label="Occupation">
                <el-input v-model="patientForm.occupation" />
              </el-form-item>
            </el-col>
          </el-row>
          <el-divider />
          <el-row :gutter="16">
            <el-col :span="12">
              <el-form-item label="Contact 1">
                <el-input v-model="patientForm.contact_1" />
              </el-form-item>
            </el-col>
            <el-col :span="12">
              <el-form-item label="Contac 2">
                <el-input v-model="patientForm.contact_2" />
              </el-form-item>
            </el-col>
          </el-row>
          <el-divider />
          <el-row :gutter="16">
            <el-col :span="12">
              <el-form-item label="Martial Status">
                <el-input v-model="patientForm.marital_status" />
              </el-form-item>
            </el-col>
            <el-col :span="12">
              <el-form-item label="Blood Group">
                <!-- <el-input v-model="patientForm.blood_group" /> -->
                <el-select v-model="patientForm.blood_group">
                  <el-option
                    v-for="(item, index) in bloodGroups"
                    :key="index"
                    :label="item"
                    :value="item"
                  />
                </el-select>
              </el-form-item>
            </el-col>
          </el-row>
          <el-divider />
          <el-row :gutter="16">
            <el-col :span="6">
              <el-form-item label="Spouse Full Name">
                <el-input v-model="patientForm.spouse_fullname" />
              </el-form-item>
            </el-col>
            <el-col :span="6">
              <el-form-item label="Spouse Contact">
                <el-input v-model="patientForm.spouse_contact" />
              </el-form-item>
            </el-col>
            <el-col :span="6">
              <el-form-item label="Spouse Occupation">
                <el-input v-model="patientForm.spouse_occupation" />
              </el-form-item>
            </el-col>
            <el-col :span="6">
              <el-form-item label="Spouse Date of Birth">
                <el-date-picker
                  v-model="patientForm.spouse_dob"
                  type="date"
                  :shortcuts="shortcuts"
                />
              </el-form-item>
            </el-col>
          </el-row>
          <el-divider />
          <el-row justify="end">
            <el-button
              type="primary"
              @click="submit"
            >
              Register
            </el-button>
          </el-row>
        </el-form>
      </div>
    </el-col>
  </el-row>
</template>

<style lang="scss" scoped></style>
