<script setup>
import { RouterView } from 'vue-router'
// import { Search,  } from '@element-plus/icons-vue'
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

const ptSearch = ref(null)
const options = ref([
  {
    value: 'Option1',
    label: 'Option1',
  },
  {
    value: 'Option2',
    label: 'Option2',
  },
  {
    value: 'Option3',
    label: 'Option3',
  },
  {
    value: 'Option4',
    label: 'Option4',
  },
  {
    value: 'Option5',
    label: 'Option5',
  },
])

function registerPatient() {
  router.push({ name: 'add-patient' })
}

function registerProvider() {
  router.push({ name: 'add-provider' })
}

function viewPatient() {
  router.push({ name: 'view-patient' })
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
            :prefix-icon="Search"
            filterable
            :placeholder="$t('Search patient...')"
            @change="viewPatient()"
          >
            <el-option
              v-for="item in options"
              :key="item.value"
              :label="item.label"
              :value="item.value"
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
            type="primary"
            @click="registerPatient()"
          >
            {{ $t('Register Patient') }}
          </el-button>
        </el-col>

        <el-col
          :xs="4"
          :sm="14"
          class="text-end"
        >
          <el-button
            type="primary"
            plain
            class="mx-4"
            @click="registerProvider()"
          >
            {{ $t('Register Provider') }}
          </el-button>

          <el-dropdown trigger="click">
            <el-button text>
              {{ $t('Admin') }}
              <el-icon class="ms-2"><ArrowDown /></el-icon>
            </el-button>
            <template #dropdown>
              <el-dropdown-menu>
                <el-dropdown-item>{{ $t('Logout') }}</el-dropdown-item>
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