<script setup>
import PatientBio from './patient/PatientBio.vue'
import PatientHistory from './patient/PatientHistory.vue'
import PatientMedication from './patient/PatientMedication.vue'
import PatientDiagnosis from './patient/PatientDiagnosis.vue'
</script>

<template>
  <div class="p-3">
    <el-row :gutter="20">
      <!-- patient bio -->
      <el-col
        :xs="24"
        :sm="12"
        :md="8"
        :lg="8"
        :xl="8"
      >
        <PatientBio />
      </el-col>

      <!-- other data -->
      <el-col
        :xs="24"
        :sm="12"
        :md="8"
        :lg="16"
        :xl="16"
      >
        <div style="height: 100vh; overflow-y: scroll;">
          <PatientHistory />

          <PatientMedication />
          
          <PatientDiagnosis />
        </div>
      </el-col>
    </el-row>
  </div>
</template>

<style lang="scss" scoped></style>
