<script setup>
import { ref } from 'vue'

const result = ref([1])
</script>

<template>
  <el-row :gutter="20">
    <el-col :xs="24">
      <div class="border bg-white rounded-lg p-3 mb-3">
        <div class="text-center font-bold text-lg border-0 text-sm-green">{{ $t('Diagnosis') }}</div>
      </div>
    </el-col>

    <el-col
      v-for="(data, index) in result"
      :key="index"
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
            <tr>
              <td
                colspan="2"
                class="text-center font-bold text-lg border-0 text-sm-green"
              >
                نەخۆشخانەی ئەنوەرشێخە
              </td>
            </tr>
            <tr>
              <td
                colspan="2"
                class="text-center pb-4 text-gray-500"
              >
                2024-01-10 10:23 am
              </td>
            </tr>
            <tr>
              <td class="font-bold">{{ $t('Chief Complaint') }}</td>
              <td></td>
            </tr>
            <tr>
              <td class="font-bold">{{ $t('hopi') }}</td>
              <td></td>
            </tr>
            <tr>
              <td class="font-bold">{{ $t('Surgical History') }}</td>
              <td></td>
            </tr>
            <tr>
              <td class="font-bold">{{ $t('Family History') }}</td>
              <td></td>
            </tr>
            <tr>
              <td class="font-bold">{{ $t('Drug History') }}</td>
              <td></td>
            </tr>
            <tr>
              <td class="font-bold">{{ $t('Allergy History') }}</td>
              <td></td>
            </tr>
            <tr>
              <td class="font-bold">{{ $t('Note') }}</td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </el-col>
  </el-row>
</template>

<style lang="scss" scoped></style>
