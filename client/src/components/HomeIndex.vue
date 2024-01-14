<script setup>
import PatientBio from './patient/PatientBio.vue'
import PatientHistory from './patient/PatientHistory.vue'
</script>

<template>
  <div class="p-3">
    <div class="row">
      <!-- patient bio -->
      <div class="col-sm-4">
        <PatientBio />
      </div>

      <!-- other data -->
      <div class="col">
        <PatientHistory />
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped></style>
