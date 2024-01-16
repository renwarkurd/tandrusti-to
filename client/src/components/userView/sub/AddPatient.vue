<script setup>
import { ref, computed } from 'vue'
import { useBaseDataStore } from '@/stores/baseDataStore.js'
import axios from 'axios'

const baseDataStore = useBaseDataStore()

const cities = computed(() => baseDataStore.cities)
const code_types = computed(() => baseDataStore.code_types)
const bloodGroups = computed(() => baseDataStore.bloodGroups)
const maritalOptions = computed(() => baseDataStore.maritalOptions)

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
      <div class="bg-white border rounded-lg p-4">
        <div class="font-bold text-lg text-sm-green border-b mb-4 py-2">
          {{ $t('Register Patient') }}
        </div>

        <el-form
          class="demo-form-inline"
          label-width="100px"
          label-position="top"
        >
          <el-row :gutter="10">
            <el-col :span="6">
              <el-form-item :label="$t('ID Type')">
                <el-select
                  v-model="patientForm.code_type"
                  :placeholder="$t('ID Type')"
                >
                  <el-option
                    v-for="item in code_types"
                    :key="item.id"
                    :label="item.name"
                    :value="item.id"
                  />
                </el-select>
              </el-form-item>
            </el-col>
            <el-col :span="18">
              <el-form-item :label="$t('ID Code')">
                <el-input
                  v-model="patientForm.code"
                  :placeholder="$t('ID Code')"
                />
              </el-form-item>
            </el-col>
          </el-row>
          <el-row :gutter="10">
            <el-col :span="4">
              <el-form-item :label="$t('First Name')">
                <el-input
                  v-model="patientForm.first_name"
                  :placeholder="$t('First Name')"
                />
              </el-form-item>
            </el-col>
            <el-col :span="4">
              <el-form-item :label="$t('Middle Name')">
                <el-input
                  v-model="patientForm.middle_name"
                  :placeholder="$t('Middle Name')"
                />
              </el-form-item>
            </el-col>
            <el-col :span="4">
              <el-form-item :label="$t('Last Name')">
                <el-input
                  v-model="patientForm.last_name"
                  :placeholder="$t('Last Name')"
                />
              </el-form-item>
            </el-col>
            <el-col :span="4">
              <el-form-item :label="$t('Gender')">
                <el-radio-group v-model="patientForm.gender">
                  <el-radio-button label="0">{{ $t('Female') }}</el-radio-button>
                  <el-radio-button label="1">{{ $t('Male') }}</el-radio-button>
                </el-radio-group>
              </el-form-item>
            </el-col>
            <el-col :span="7">
              <el-form-item :label="$t('Date of Birth')">
                <el-input-number
                  :controls="false"
                  style="width: 70px; margin-right: 4px; margin-left: 4px"
                  v-model="patientForm.dob_year"
                  min="1900"
                  max="2100"
                  :placeholder="$t('Year')"
                />
                <span class="text-2xl">/</span>
                <el-input-number
                  :controls="false"
                  style="width: 60px; margin-right: 4px; margin-left: 4px"
                  v-model="patientForm.dob_month"
                  min="1"
                  max="12"
                  :placeholder="$t('Month')"
                />
                <span class="text-2xl">/</span>
                <el-input-number
                  :controls="false"
                  style="width: 60px; margin-right: 5px; margin-left: 4px"
                  v-model="patientForm.dob_day"
                  min="1"
                  max="31"
                  :placeholder="$t('Day')"
                />
              </el-form-item>
            </el-col>
          </el-row>
          <el-divider />
          <el-row :gutter="10">
            <el-col :span="8">
              <el-form-item :label="$t('City')">
                <el-select
                  v-model="patientForm.city_id"
                  :placeholder="$t('City')"
                >
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
              <el-form-item :label="$t('Address')">
                <el-input
                  v-model="patientForm.address"
                  :placeholder="$t('Address')"
                />
              </el-form-item>
            </el-col>
            <el-col :span="8">
              <el-form-item :label="$t('Occupation')">
                <el-input
                  v-model="patientForm.occupation"
                  :placeholder="$t('Occupation')"
                />
              </el-form-item>
            </el-col>
          </el-row>
          <el-divider />
          <el-row :gutter="10">
            <el-col :span="12">
              <el-form-item :label="$t('Contact 1')">
                <el-input
                  v-model="patientForm.contact_1"
                  :placeholder="$t('Contact 1')"
                />
              </el-form-item>
            </el-col>
            <el-col :span="12">
              <el-form-item :label="$t('Contact 2')">
                <el-input
                  v-model="patientForm.contact_2"
                  :placeholder="$t('Contact 2')"
                />
              </el-form-item>
            </el-col>
          </el-row>
          <el-divider />
          <el-row :gutter="10">
            <el-col :span="12">
              <el-form-item :label="$t('Marital Status')">
                <el-select
                  v-model="patientForm.marital_status"
                  :placeholder="$t('Marital Status')"
                >
                  <el-option
                    v-for="(item, index) in maritalOptions"
                    :key="index"
                    :label="$t(item)"
                    :value="item"
                  />
                </el-select>
              </el-form-item>
            </el-col>
            <el-col :span="12">
              <el-form-item :label="$t('Blood Group')">
                <el-select
                  v-model="patientForm.blood_group"
                  :placeholder="$t('Blood Group')"
                >
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
          <el-row :gutter="10">
            <el-col :span="6">
              <el-form-item :label="$t('Spouse Full Name')">
                <el-input
                  v-model="patientForm.spouse_fullname"
                  :placeholder="$t('Spouse Full Name')"
                />
              </el-form-item>
            </el-col>
            <el-col :span="6">
              <el-form-item :label="$t('Spouse Contact')">
                <el-input
                  v-model="patientForm.spouse_contact"
                  :placeholder="$t('Spouse Contact')"
                />
              </el-form-item>
            </el-col>
            <el-col :span="6">
              <el-form-item :label="$t('Spouse Occupation')">
                <el-input
                  v-model="patientForm.spouse_occupation"
                  :placeholder="$t('Spouse Occupation')"
                />
              </el-form-item>
            </el-col>
            <el-col :span="6">
              <el-form-item :label="$t('Spouse Date of Birth')">
                <el-date-picker
                  v-model="patientForm.spouse_dob"
                  :placeholder="$t('Spouse Date of Birth')"
                  type="date"
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
              {{ $t('Register') }}
            </el-button>
          </el-row>
        </el-form>
      </div>
    </el-col>
  </el-row>
</template>

<style lang="scss" scoped></style>
