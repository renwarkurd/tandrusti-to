<script setup>
import { computed } from 'vue'

const props = defineProps(['items'])

const items = computed(() => props.items)
</script>

<template>
  <el-row :gutter="20">
    <el-col :xs="24">
      <div class="border bg-white rounded-lg p-3 mb-3">
        <div class="text-center font-bold text-lg border-0 text-sm-green">{{ $t('Diagnosis') }}</div>
      </div>
    </el-col>

    <el-col
      :xs="24"
      :sm="24"
      :md="12"
      :lg="12"
      :xl="12"
      class="pb-4"
    >
      <div class="border bg-white rounded-lg p-3">
        <table>
          <tbody>
            <tr
              v-for="(item, index) in items"
              :key="index"
            >
              <td
                colspan="2"
                class="text-center font-bold text-lg border-0 text-sm-green"
              >
                {{ item.description }} by {{ item.user.name }} at
                <span class="text-center pb-4 text-gray-500">
                  {{ item.user.created_at }}
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </el-col>
  </el-row>
</template>

<style lang="scss" scoped></style>
