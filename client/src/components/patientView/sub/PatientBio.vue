<script setup>
import { computed } from 'vue'

const props = defineProps(['patient'])

const patient = computed(() => props.patient)
</script>

<template>
  <div class="border bg-white rounded-lg p-3">
    <table>
      <tbody>
        <tr>
          <td
            colspan="2"
            class="text-center font-bold text-lg pb-4 border-0 text-sm-green"
          >
            زانیاری کەسی
          </td>
        </tr>
        <tr>
          <td class="font-bold">ناوی سیانی</td>
          <td>{{ patient.full_name }}</td>
        </tr>
        <tr>
          <td class="font-bold">تەمەن</td>
          <td>
            <div class="flex">
              <span>{{ patient.calculated_age.y }} ساڵ</span>
              <span class="mx-">, </span>
              <span>{{ patient.calculated_age.m }} مانگ</span>
              <span class="mx-">, </span>
              <span>{{ patient.calculated_age.d }} ڕۆژ</span>
            </div>
          </td>
        </tr>
        <tr>
          <td class="font-bold">جۆری کۆد</td>
          <td>{{ code }}</td>
        </tr>
        <tr>
          <td class="font-bold">کۆد</td>
          <td>2384746183933</td>
        </tr>
        <tr>
          <td class="font-bold">ژ.مۆبایل ١</td>
          <td>07708948086</td>
        </tr>
        <tr>
          <td class="font-bold">ژ.مۆبایل ٢</td>
          <td>07708948086</td>
        </tr>
        <tr>
          <td class="font-bold">ڕەگەز</td>
          <td>نێر</td>
        </tr>
        <tr>
          <td class="font-bold">بەرواری لەدایک بوون</td>
          <td>5/2/1997</td>
        </tr>
        <tr>
          <td class="font-bold">شار</td>
          <td>سلێمانی</td>
        </tr>
        <tr>
          <td class="font-bold">پیشە</td>
          <td>پڕۆگرامەر</td>
        </tr>
        <tr>
          <td class="font-bold">ناونیشان</td>
          <td>هەواری شار</td>
        </tr>
        <tr>
          <td class="font-bold">باری خێزانی</td>
          <td>خێزاندار</td>
        </tr>
        <tr>
          <td class="font-bold border-0">گرووپی خوێن</td>
          <td class="border-0">O+</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<style lang="scss" scoped></style>
