<script setup>
import { RouterView } from 'vue-router'
import { Search } from '@element-plus/icons-vue'
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

function register() {
  router.push({name: 'add-patient'})
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
          :lg="10"
          :xl="10"
        >
          <el-select
            v-model="ptSearch"
            :prefix-icon="Search"
            filterable
            :placeholder="$t('Search patient...')"
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
          :lg="4"
          :xl="4"
        >
          <el-button type="primary" @click="register()">
            {{ $t('Register') }}
          </el-button>
        </el-col>
      </el-row>
    </el-header>
    <el-main>
      <RouterView />
    </el-main>
  </el-container>
</template>

<style lang="scss" scoped></style>
