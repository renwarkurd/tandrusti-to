<script setup>
import PatientBio from './patient/PatientBio.vue'
import PatientHistory from './patient/PatientHistory.vue'
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
        :lg="8"
        :xl="16"
      >
        <PatientHistory />
      </el-col>
    </el-row>
  </div>
</template>

<style lang="scss" scoped></style>
