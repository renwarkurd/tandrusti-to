<script setup>
import { computed } from 'vue'

const props = defineProps(['items'])

const items = computed(() => props.items)
</script>

<template>
  <el-row>
    <el-col :xs="24">
      <div class="border bg-white rounded-lg p-3 mb-3">
        <div class="text-center font-bold text-lg border-0 text-sm-green">{{ $t('Medical History') }}</div>
      </div>
    </el-col>

    <el-col
      v-for="(item, index) in items"
      :key="index"
      :xs="24"
      :sm="24"
      :md="24"
      :lg="24"
      :xl="24"
      class="pb-4"
    >
      <div class="border bg-white rounded-lg p-3">
        <table>
          <tbody>
            <tr>
              <td class="font-bold">{{ $t('Chief Complaint') }}</td>
              <td>
                <div>
                  <span>{{ item.chief_complaint }}</span>
                  <b class="ms-5 me-2">{{ $t('Duration') }}</b>
                  <span>{{ item.cheif_complaint_duration }}</span>
                </div>
              </td>
            </tr>
            <tr>
              <td class="font-bold">{{ $t('H.O.P.I') }}</td>
              <td>{{ item.hopi }}</td>
            </tr>
            <tr>
              <td class="font-bold">{{ $t('Past Medical History') }}</td>
              <td>{{ item.past_medical_history }}</td>
            </tr>
            <tr>
              <td class="font-bold">{{ $t('Surgical History') }}</td>
              <td>{{ item.surgical_history }}</td>
            </tr>
            <tr>
              <td class="font-bold">{{ $t('Family History') }}</td>
              <td>{{ item.family_history }}</td>
            </tr>
            <tr>
              <td class="font-bold">{{ $t('Drug History') }}</td>
              <td>{{ item.drug_history }}</td>
            </tr>
            <tr>
              <td class="font-bold">{{ $t('Allergy History') }}</td>
              <td>{{ item.allergy_history }}</td>
            </tr>
            <tr>
              <td class="font-bold">{{ $t('Social History') }}</td>
              <td>{{ item.social_history }}</td>
            </tr>

            <tr>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td class="font-bold">{{ $t('GPAD') }}</td>
              <td>
                <div class="flex">
                  <span class="mx-2">
                    <b>G:</b>
                    {{ item.history_gpd_g }}
                  </span>
                  <span class="mx-2">
                    <b>P:</b>
                    {{ item.history_gpd_p }}
                  </span>
                  <span class="mx-2">
                    <b>A:</b>
                    {{ item.history_gpd_a }}
                  </span>
                  <span class="mx-2">
                    <b>D:</b>
                    {{ item.history_gpd_d }}
                  </span>
                </div>
              </td>
            </tr>
            <tr>
              <td class="font-bold">{{ $t('Menstrual History') }}</td>
              <td>{{ item.history_menstrual }}</td>
            </tr>
            <tr>
              <td class="font-bold">{{ $t('E.D.D') }}</td>
              <td>{{ item.history_edd }}</td>
            </tr>
            <tr>
              <td class="font-bold">{{ $t('L.M.P') }}</td>
              <td>{{ item.history_lmp }}</td>
            </tr>
            <tr>
              <td class="font-bold">{{ $t('Gestational Age') }}</td>
              <td>{{ item.history_gestational_age }}</td>
            </tr>

            <tr>
              <td class="font-bold">{{ $t('Note') }}</td>
              <td>{{ item.note }}</td>
            </tr>

            <tr>
              <td colspan="2">
                <div class="flex text-gray-500 justify-end">
                  <em class="me-3">by {{ item.user.name }}</em>
                  <em class="">at {{ item.user.created_at }}</em>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </el-col>
  </el-row>
</template>

<style lang="scss" scoped>
tr {
  td:first-of-type {
    white-space: pre;
    text-align: right;
  }
}
</style>
