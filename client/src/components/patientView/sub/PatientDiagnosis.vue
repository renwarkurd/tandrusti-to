<script setup>
import { computed } from 'vue'

const props = defineProps(['items'])

const items = computed(() => props.items)
</script>

<template>
  <el-row>
    <el-col :xs="24">
      <div class="border bg-white rounded-lg p-3 mb-3">
        <div class="text-center font-bold text-lg border-0 text-sm-green">{{ $t('Diagnosis') }}</div>
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
        <div
          v-for="(item, index) in items"
          :key="index"
          class="mb-4"
        >
          <div class="">
            <b># {{ index + 1 }}</b>
            <div class="font-medium">
              {{ item.description }}
            </div>
            <div class="flex text-gray-500">
              <em class="me-3">by {{ item.user.name }}</em>
              <em class="">at {{ item.user.created_at }}</em>
            </div>
          </div>
        </div>
      </div>
    </el-col>
  </el-row>
</template>

<style lang="scss" scoped></style>
