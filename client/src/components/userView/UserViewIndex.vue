<script setup>
import { RouterView } from 'vue-router'
import { useAuthStore } from '@/stores/auth.js'
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { onMounted } from 'vue'
import axios from 'axios'

const router = useRouter()
const auth = useAuthStore()

const ptSearch = ref(null)
const loadingSearch = ref(false)
const patientList = ref([])

onMounted(() => {
  if (!auth.authUser?.id) {
    router.push('/user-login')
  }
})

function registerPatient() {
  router.push({ name: 'add-patient' })
}

function registerProvider() {
  router.push({ name: 'provider-list' })
}

// function viewPatient() {
//   router.push({ name: 'view-patient' })
// }

function searchPatient(keyword) {
  loadingSearch.value = true

  axios.post('patient/search', { keyword: keyword }).then((res) => {
    patientList.value = res.data
  })
}

async function handleUserCommand(command) {
  if (command == 'logout') {
    await auth.logout()
    router.push('/')
  }
}
</script>

<template>
  <el-container>
    <el-header class="bg-white">
      <el-row
        :gutter="20"
        justify="center"
        align="middle"
        style="height: 100%"
      >
        <el-col
          :xs="20"
          :sm="20"
          :md="16"
          :lg="8"
          :xl="8"
        >
          <el-select
            v-model="ptSearch"
            filterable
            remote
            reserve-keyword
            :placeholder="$t('Search patient...')"
            :remote-method="searchPatient"
            :loading="loadingSearch"
          >
            <el-option
              v-for="pt in patientList"
              :key="pt.id"
              :label="pt.full_name"
              :value="pt.code"
            />
          </el-select>
        </el-col>

        <el-col
          :xs="4"
          :sm="4"
          :md="4"
          :lg="2"
          :xl="2"
        >
          <el-button
            color="#00BFA6"
            @click="registerPatient()"
          >
            <span class="text-white">
              {{ $t('Register Patient') }}
            </span>
          </el-button>
        </el-col>

        <el-col
          :xs="4"
          :sm="14"
          class="text-end"
        >
          <el-button
            color="#00BFA6"
            plain
            class="mx-4"
            @click="registerProvider()"
          >
            {{ $t('Register Provider') }}
          </el-button>

          <el-dropdown
            trigger="click"
            @command="handleUserCommand"
          >
            <el-button text>
              {{ auth.authUser.name }}
              <el-icon class="ms-2"><ArrowDown /></el-icon>
            </el-button>
            <template #dropdown>
              <el-dropdown-menu>
                <el-dropdown-item command="logout">{{ $t('Logout') }}</el-dropdown-item>
              </el-dropdown-menu>
            </template>
          </el-dropdown>
        </el-col>
      </el-row>
    </el-header>
    <el-main>
      <RouterView />
    </el-main>
  </el-container>
</template>

<style lang="scss" scoped></style>
