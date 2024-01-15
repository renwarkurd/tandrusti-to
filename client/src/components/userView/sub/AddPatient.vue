<script setup>
import { ref, computed, onMounted } from 'vue'

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

function submit()
{
  // axios.
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
            <el-col span="auto">
              <el-form-item label="Gender">
                <el-radio-group
                  v-model="patientForm.gender"
                  class="ml-4"
                >
                  <el-radio label="1">Male</el-radio>
                  <el-radio label="2">Female</el-radio>
                </el-radio-group>
              </el-form-item>
            </el-col>
            <el-col span="auto">
              <el-form-item label="Date of birth">
                <el-input-number
                  :controls="false"
                  style="width: 100px; margin-right: 4px; margin-left: 4px"
                  v-model="patientForm.dob_year"
                />
                <span class="text-2xl">/</span>
                <el-input-number
                  :controls="false"
                  style="width: 100px; margin-right: 4px; margin-left: 4px"
                  v-model="patientForm.dob_month"
                />
                <span class="text-2xl">/</span>
                <el-input-number
                  :controls="false"
                  style="width: 100px; margin-right: 5px; margin-left: 4px"
                  v-model="patientForm.dob_day"
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
                    v-for="item in options"
                    :key="item.value"
                    :label="item.label"
                    :value="item.value"
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
                <el-input v-model="patientForm.blood_group" />
              </el-form-item>
            </el-col>
          </el-row>
          <el-divider />
          <div><span class="text-">Spouse</span></div>
          <el-row :gutter="16">
            <el-col :span="6">
              <el-form-item label="Spouse">
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
                <el-input v-model="patientForm.spouse_dob" />
              </el-form-item>
            </el-col>
          </el-row>
          <el-divider />
          <el-row justify="end">
            <el-button
              color="blue"
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
