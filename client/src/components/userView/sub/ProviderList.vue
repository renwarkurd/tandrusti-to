<script setup>
import axios from 'axios'
import { onMounted } from 'vue'
import { ref } from 'vue'
import { ElMessage } from 'element-plus'

const apiData = ref([])
const form = ref({
  id: null,
  username: null,
  name: null,
  email: null,
  password: null,
  regenerate_token: false,
})
const editMode = ref(false)

const newProviderData = ref({
  name: null,
  username: null,
  email: null,
  provider_token: null,
})

onMounted(() => {
  getData()
})

function clearForm() {
  form.value = {
    id: null,
    username: null,
    name: null,
    email: null,
    password: null,
    regenerate_token: false,
  }

  editMode.value = false
}

function getData() {
  axios.get('admin/provider').then((res) => {
    apiData.value = res.data
  })
}

function submit() {
  if (editMode.value) {
    axios.put(`admin/provider/${form.value.id}`, form.value).then(() => {
      ElMessage({
        message: 'Saved successfully',
        type: 'success',
      })
      clearForm()
      getData()
    })
  } else {
    axios.post('admin/provider', form.value).then((res) => {
      newProviderData.value = res.data
      ElMessage({
        message: 'Saved successfully',
        type: 'success',
      })
      clearForm()
      getData()
    })
  }
}

function editRow(data) {
  form.value = { ...data, regenerate_token: false }
  editMode.value = true
}

function copyToken(token) {
  navigator.clipboard.writeText(token)
  ElMessage({
    message: 'Token copied to clipboard',
    type: 'info',
  })
}
</script>

<template>
  <el-row
    :gutter="20"
    justify="center"
  >
    <el-col
      :xs="24"
      :sm="20"
      :md="16"
      :lg="18"
      :xl="16"
    >
      <el-row :gutter="20">
        <!-- table -->
        <el-col
          :xs="24"
          :sm="14"
          :md="14"
          :lg="14"
          :xl="14"
          class="mb-4"
        >
          <div class="bg-white border rounded-lg p-4">
            <div class="border-b pb-2 mb-4 font-medium text-lg">
              {{ $t('Provider List') }}
            </div>

            <el-table
              :data="apiData"
              style="width: 100%"
              height="700"
            >
              <el-table-column
                prop="username"
                :label="$t('Username')"
              />
              <el-table-column
                prop="name"
                :label="$t('Provider Name')"
              />
              <el-table-column
                prop="email"
                :label="$t('Email')"
              />
              <el-table-column
                fixed="right"
                :label="$t('Actions')"
                width="120"
              >
                <template #default="scope">
                  <el-button
                    link
                    type="primary"
                    size="small"
                    @click="editRow(scope.row)"
                  >
                    {{ $t('Edit') }}
                  </el-button>
                </template>
              </el-table-column>
            </el-table>
          </div>
        </el-col>

        <!-- form -->
        <el-col
          :xs="24"
          :sm="10"
          :md="10"
          :lg="10"
          :xl="10"
          class="mb-4"
        >
          <div class="bg-white border rounded-lg p-4">
            <div class="border-b pb-2 mb-4 font-medium text-lg">
              {{ editMode ? $t('Update Provider') : $t('Register New Provider') }}
            </div>

            <el-form
              :model="form"
              label-position="top"
            >
              <el-row :gutter="20">
                <el-col
                  :xs="24"
                  :sm="24"
                >
                  <el-form-item :label="$t('Username')">
                    <el-input
                      v-model="form.username"
                      :placeholder="$t('Username')"
                    />
                  </el-form-item>
                </el-col>

                <el-col
                  :xs="24"
                  :sm="24"
                >
                  <el-form-item :label="$t('Provider Name')">
                    <el-input
                      v-model="form.name"
                      :placeholder="$t('Provider Name')"
                    />
                  </el-form-item>
                </el-col>

                <el-col
                  :xs="24"
                  :sm="24"
                >
                  <el-form-item :label="$t('Email')">
                    <el-input
                      v-model="form.email"
                      :placeholder="$t('Email')"
                    />
                  </el-form-item>
                </el-col>

                <el-col
                  :xs="24"
                  :sm="24"
                >
                  <el-form-item :label="$t('Password')">
                    <el-input
                      v-model="form.password"
                      :placeholder="$t('Password')"
                      show-password
                    />
                  </el-form-item>
                </el-col>

                <el-col
                  :xs="24"
                  :sm="12"
                >
                  <el-form-item v-if="editMode">
                    <el-checkbox
                      v-model="form.regenerate_token"
                      :label="$t('Regenerate Token')"
                    />
                  </el-form-item>
                </el-col>

                <el-col
                  :xs="24"
                  :sm="12"
                  class="text-end"
                >
                  <el-button
                    type="primary"
                    icon="Check"
                    @click="submit()"
                  >
                    {{ $t('Save') }}
                  </el-button>
                </el-col>
              </el-row>
            </el-form>

            <el-alert
              v-if="newProviderData.username"
              :title="$t('Provider Data')"
              closable
              class="mt-5"
            >
              <template #default>
                <div class="text-sm">
                  <div>
                    <b>{{ $t('Username') }}: </b> {{ newProviderData.username ?? 'brwa' }}
                  </div>

                  <div>
                    <b>{{ $t('Provider Name') }}: </b> {{ newProviderData.name ?? 'Brwa Ata' }}
                  </div>

                  <div>
                    <b>{{ $t('Email') }}: </b> {{ newProviderData.email ?? 'brwa@gmail.com' }}
                  </div>

                  <div>
                    <b>{{ $t('Token') }}: </b>
                    {{ newProviderData.provider_token }}
                  </div>

                  <div class="text-end">
                    <el-button
                      text
                      @click="copyToken(newProviderData.provider_token)"
                    >
                      <el-icon><CopyDocument /></el-icon>
                    </el-button>
                  </div>
                </div>
              </template>
            </el-alert>
          </div>
        </el-col>
      </el-row>
    </el-col>
  </el-row>
</template>

<style lang="scss" scoped></style>
