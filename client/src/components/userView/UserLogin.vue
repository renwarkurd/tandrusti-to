<script setup>
import { onMounted, ref } from 'vue'
import { useAuthStore } from '@/stores/auth.js'
import { useRouter } from 'vue-router'

const router = useRouter()
const auth = useAuthStore()

const form = ref({
  username: null,
  password: null,
})

onMounted(() => {
  if (auth.authUser && auth.authUser.id) {
    router.push('/user-view')
  }
})

async function loginUser() {
  await auth.login(form.value)
  router.push('user-view')
}
</script>

<template>
  <div class="px-10">
    <el-row
      align="middle"
      justify="center"
      style="height: 90vh"
    >
      <!-- form -->
      <el-col
        :xs="24"
        :sm="24"
        :md="8"
        :lg="8"
        :xl="8"
      >
        <div class="border bg-white rounded-lg shadow-sm py-5 px-6">
          <div class="text-center mb-4">
            <el-avatar :size="60">
              <el-icon size="40"><UserFilled /></el-icon>
            </el-avatar>
          </div>
          <div class="text-center text-lg mb-4">چوونەژوورەوە بۆ هەژمار</div>

          <el-form
            :model="form"
            label-position="top"
            size="large"
          >
            <el-form-item :label="$t('Username')">
              <el-input
                v-model="form.username"
                :placeholder="$t('Username')"
              />
            </el-form-item>

            <el-form-item :label="$t('Password')">
              <el-input
                v-model="form.password"
                :placeholder="$t('Password')"
                show-password
              />
            </el-form-item>

            <el-form-item>
              <el-button
                color="#00BFA6"
                @click="loginUser()"
              >
                <span class="text-white">
                  {{ $t('Login') }}
                </span>
              </el-button>
            </el-form-item>
          </el-form>
        </div>
      </el-col>
    </el-row>
  </div>
</template>

<style lang="scss" scoped></style>
