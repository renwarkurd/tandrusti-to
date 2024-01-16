<script setup>
import { useAuthStore } from '@/stores/auth';
import { computed } from 'vue'

const props = defineProps(['items'])
const authStore = useAuthStore()

const items = computed(() => props.items)

function isPdf(fileName) {
  return fileName.split('.').pop() == 'pdf'
}
function storagePath(argument) {
  return import.meta.env.VITE_API_ENDPOINT + 'api/file-storage/' + argument + '?token=' + authStore.token
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
      <div class="border bg-white rounded-lg p-3">
        <template v-if="items.length">
          <div
            v-for="(item, index) in items"
            :key="index"
            class="mb-4"
          >
            <div class="">
              <b># {{ index + 1 }}</b>
              <div class="font-medium">
                <template v-if="isPdf(item.filename)">
                  <div
                    class="file-image-box"
                  >
                    <iframe
                      v-if="storagePath('files/' + file.filename)"
                      :src="storagePath('files/' + file.filename)"
                      frameborder="0"
                      style="overflow: hidden; pointer-events: none; height: 100%"
                    />
                  </div>
                </template>
                <template v-else>
                  <div
                    class="file-image-box"
                  >
                    <img
                      class="mb-2"
                      :class="{ 'pdf-icon': isPdf(file.filename) }"
                      :src="getImage(storagePath('files/' + file.filename))"
                    />
                  </div>
                </template>
                {{ item.filename }}
              </div>
              <div class="flex text-gray-500">
                <em class="me-3">by {{ item.user.name }}</em>
                <em class="">at {{ item.user.created_at }}</em>
              </div>
            </div>
          </div>
        </template>
        <template v-else>
          <div class="text-center text-gray-500">No record</div>
        </template>
      </div>
    </el-col>
  </el-row>
</template>

<style lang="scss" scoped></style>
