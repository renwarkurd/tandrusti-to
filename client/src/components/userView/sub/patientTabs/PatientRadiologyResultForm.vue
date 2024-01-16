<script setup>
import { ref, computed } from 'vue'
import { usePatientStore } from '@/stores/patientStore'
import axios from 'axios'
import { ElMessage } from 'element-plus'

const patientStore = usePatientStore()
const patient = computed(() => patientStore.patient)
const fileRef = ref(null)
const files = ref([])
const dialog = ref(false)
const dialogData = ref({})

function openFileExplorer() {
  fileRef.value.click()
}

function fileSelected() {
  files.value.push({
    url: URL.createObjectURL(fileRef.value.files[0]),
    file: fileRef.value.files[0],
  })

  fileRef.value = ''
}

function removeFile(index) {
  files.value.splice(index, 1)
}

function isPdf(fileName) {
  return fileName.split('.').pop() == 'pdf'
}

function storagePath(patientId, fileName) {
  return import.meta.env.VITE_API_ENDPOINT + `patient/${patientId}/radiology-attachment/${fileName}`
}

function showAttachment(item) {
  dialogData.value = {}
  dialog.value = true
  dialogData.value = item
}

function clearForm() {
  files.value = []
  fileRef.value = ''
}

function submit() {
  let form = new FormData()
  form.append('patient_id', patient.value.id)

  files.value.forEach((item) => {
    form.append('files[]', item.file)
  })

  axios.post(`patient/radiology`, form).then(() => {
    patientStore.show(patient.value.code)
    ElMessage({
      message: 'Saved successfully',
      type: 'success',
    })

    clearForm()
  })
}
</script>
<template>
  <div class="font-bold text-lg text-sm-green border-b mb-4 py-2">
    {{ $t('Radiology Results Form') }}
  </div>

  <!-- form -->
  <div class="flex gap-2 flex-wrap">
    <!-- upload file -->
    <div
      class="cursor-pointer flex justify-center w-28 h-28 border border-dashed rounded-lg mb-2"
      @click="openFileExplorer()"
    >
      <input
        ref="fileRef"
        type="file"
        class="absolute"
        style="top: -10000000px; visibility: hidden"
        @input="fileSelected()"
      />
      <div style="margin-top: auto; margin-bottom: auto">
        <div class="text-center">
          <el-icon size="20"><Upload /></el-icon>
        </div>
        <div class="text-xs">
          {{ $t('Upload file') }}
        </div>
      </div>
    </div>

    <!-- show uploaded file -->
    <div
      v-for="(file, fIndex) in files"
      :key="fIndex"
      class="w-28 h-28 rounded-lg mb-2 relative"
      :class="{
        border: !file.file.type.includes('image'),
      }"
    >
      <template v-if="file.file.type.includes('image')">
        <img
          :src="file.url"
          style="width: 100%; height: 100%; object-fit: cover; border-radius: 6px"
        />
      </template>
      <template v-else>
        <div
          class="absolute"
          style="top: 50%; left: 50%; transform: translate(-50%, -50%)"
        >
          <el-icon size="60"><Document /></el-icon>
        </div>
      </template>

      <!-- remove button -->
      <div
        class="absolute"
        style="right: -5px; top: -5px"
      >
        <el-button
          type="danger"
          circle
          size="small"
          @click="removeFile(fIndex)"
        >
          <el-icon size="14"><Delete /></el-icon>
        </el-button>
      </div>
    </div>
  </div>

  <el-row>
    <el-col
      :span="24"
      class="text-end"
    >
      <el-button
        v-if="files.length"
        type="primary"
        icon="Check"
        @click="submit()"
      >
        {{ $t('Save') }}
      </el-button>
    </el-col>
  </el-row>

  <div class="font-bold text-lg text-sm-green border-b my-4 py-2">
    {{ $t('Patient Radiology Results') }}
  </div>

  <div class="border bg-white rounded-lg p-3 flex flex-wrap gap-2">
    <div
      v-for="(item, index) in patient.radiology_results"
      :key="index"
      class="file-box rounded p-2"
      @click="showAttachment(item)"
    >
      <template v-if="isPdf(item.filename)">
        <div class="file-image-box rounded mb-1 bg-white">
          <iframe
            v-if="storagePath(item.patient_id, item.filename)"
            :src="storagePath(item.patient_id, item.filename)"
            frameborder="0"
            scrolling="no"
            style="overflow: hidden; pointer-events: none; height: 100%; border: 0"
          />
        </div>
      </template>
      <template v-else>
        <div class="file-image-box rounded mb-1 bg-white">
          <img
            class="mb-2"
            :class="{ 'pdf-icon': isPdf(item.filename) }"
            :src="storagePath(item.patient_id, item.filename)"
          />
        </div>
      </template>
      <div class="flex">
        <b># {{ index + 1 }}</b>
      </div>
      <div>
        <em class="text-gray-500 text-xs">at {{ item.created_at }}</em>
      </div>
    </div>
  </div>

  <el-dialog
    v-model="dialog"
    center
    align-center
  >
    <template #header="{ titleId, titleClass }">
      <div class="my-header">
        <h4
          :id="titleId"
          :class="titleClass"
        >
          <span class="text-gray-500 text-sm">
            at {{ dialogData.created_at }}
          </span>
        </h4>
      </div>
    </template>

    <div v-if="dialogData.id">
      <template v-if="isPdf(dialogData.filename)">
        <div class="rounded">
          <iframe
            :src="storagePath(dialogData.patient_id, dialogData.filename)"
            class="w-full h-full border-0"
            style="min-height: 600px !important; border: 0"
            frameborder="0"
          ></iframe>
        </div>
      </template>
      <template v-else>
        <div
          class="rounded overflow-y-scroll"
          style="max-height: 80vh"
        >
          <img
            :class="{ 'pdf-icon': isPdf(dialogData.filename), 'w-full': true }"
            :src="storagePath(dialogData.patient_id, dialogData.filename)"
          />
        </div>
      </template>
    </div>
  </el-dialog>
</template>
<style scoped>
.file-box {
  overflow: hidden;
  position: relative;
  background: #e8efed;
  width: 170px;
}
.file-image-box {
  overflow: hidden;
}
.file-box img {
  width: 100%;
}
@media (min-width: 576px) {
  .file-image-box {
    height: 140px !important;
  }
}
</style>
