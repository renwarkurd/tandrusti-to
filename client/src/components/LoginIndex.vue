<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

const form = ref({
  code_type: 'کارتی نیشتمانی',
  code: null,
})

function login() {
  if (form.value.code) {
    router.push({ name: 'patient-view', params: { code: form.value.code } })
  }
}

function loginAsUser() {
  router.push('/user-login')
}
</script>

<template>
  <div class="px-10">
    <div class="m-3 absolute z-10">
      <el-button
        color="#00BFA6"
        @click="loginAsUser()"
      >
        <span class="text-white">
          {{ $t('Login as user') }}
        </span>
      </el-button>
    </div>

    <el-row
      align="middle"
      style="height: 100vh"
    >
      <!-- info -->
      <el-col
        :xs="24"
        :sm="24"
        :md="16"
        :lg="14"
        :xl="16"
      >
        <img
          src="../assets/images/image2.svg"
          alt=""
          style="width: 90%"
        />
      </el-col>

      <!-- form -->
      <el-col
        :xs="24"
        :sm="24"
        :md="8"
        :lg="10"
        :xl="8"
      >
        <div class="border bg-white rounded-lg shadow-sm py-5 px-6">
          <div class="mb-7 text-xl text-center">
            بەخێربێیت بۆ پۆڕتاڵی
            <span class="text-sm-green">تەندرووستی تۆ</span>
            <div>لێرە دەتوانیت زانیارییە تەندرووستییەکانت ببینیتەوە</div>
          </div>

          <div class="text-center text-lg mb-4">چوونەژوورەوە بۆ هەژمار</div>

          <el-form
            :model="form"
            label-position="top"
          >
            <el-form-item label="جۆری کۆدەکەت دەستنیشان بکە">
              <el-radio-group
                v-model="form.code_type"
                size="large"
              >
                <el-radio-button label="کارتی نیشتمانی" />
                <el-radio-button label="پاسپۆرت" />
              </el-radio-group>
            </el-form-item>

            <el-form-item label="کۆد">
              <el-input
                v-model="form.code"
                placeholder="کۆدەکەت لێرە بنووسە"
              />
            </el-form-item>

            <el-form-item>
              <el-button
                color="#00BFA6"
                @click="login()"
              >
                <span class="text-white">بینینەوەی داتاکانم</span>
              </el-button>
            </el-form-item>
          </el-form>
        </div>
      </el-col>
    </el-row>
  </div>
</template>

<style lang="scss" scoped></style>
