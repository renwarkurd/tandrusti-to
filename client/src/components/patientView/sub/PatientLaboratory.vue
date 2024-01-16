<script setup>
import { computed, ref } from 'vue'

const props = defineProps(['items'])
const dialog = ref(false)
const dialogData = ref({})

const items = computed(() => props.items)

function isPdf(fileName) {
  return fileName.split('.').pop() == 'pdf'
}
function storagePath(patientId, fileName) {
  return import.meta.env.VITE_API_ENDPOINT + `patient/${patientId}/laboratory-attachment/${fileName}`
}
function showAttachment(item) {
  dialogData.value = {}
  dialog.value = true
  dialogData.value = item
}
</script>

<template>
  <el-row>
    <el-col :xs="24">
      <div class="border bg-white rounded-lg p-3 mb-3">
        <div class="text-center font-bold text-lg border-0 text-sm-green">{{ $t('Laboratory Results') }}</div>
      </div>
    </el-col>

    <el-col
      :xs="24"
      :sm="24"
      :md="24"
      :lg="24"
      :xl="24"
      class="pb-4"
    >
      <div class="border bg-white rounded-lg p-3 flex flex-wrap gap-2">
        <template v-if="items.length">
          <div
            v-for="(item, index) in items"
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
              <em class="text-gray-500 ms-3">by {{ item.user.name }}</em>
            </div>
            <div>
              <em class="text-gray-500 text-xs">at {{ item.created_at }}</em>
            </div>
          </div>
        </template>
        <template v-else>
          <div class="text-center text-gray-500">No record</div>
        </template>
      </div>
    </el-col>
  </el-row>

  <el-dialog v-model="dialog" center align-center>
    <template #header="{ titleId, titleClass }">
      <div class="my-header">
        <h4
          :id="titleId"
          :class="titleClass"
        >
          <span class="text-gray-500 text-sm">
            By <b>{{ dialogData.user.name }}</b> at {{ dialogData.created_at }}
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
        <div class="rounded overflow-y-scroll" style="max-height: 80vh;">
          <img
            :class="{ 'pdf-icon': isPdf(dialogData.filename), 'w-full': true }"
            :src="storagePath(dialogData.patient_id, dialogData.filename)"
          />
        </div>
      </template>
    </div>
  </el-dialog>
</template>

<style lang="scss" scoped>
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
