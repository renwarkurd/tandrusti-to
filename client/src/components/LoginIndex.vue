<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

const form = ref({
  code_type: null,
  code: null,
})

function login() {
  router.push('/home')
}
</script>

<template>
  <div class="container-fluid">
    <div
      class="row align-items-center"
      style="height: 100vh"
    >
      <!-- info -->
      <div class="col">
        <img
          src="../assets/images/image2.svg"
          alt=""
          style="width: 90%"
        />
      </div>

      <!-- form -->
      <div class="col-sm-5">
        <div class="card shadow mx-14 p-4">
          <div class="mb-5 text-xl text-center">
            بەخێڕبێیت بۆ پۆڕتاڵی
            <span class="text-sm-green">تەندرووستی تۆ</span>
            <div>لێرە دەتوانیت زانیارییە تەندرووستییەکانت ببینیتەوە</div>
          </div>
          <form
            @submit.prevent="login()"
            autocomplete="off"
          >
            <div class="mb-3">
              <label
                for="code_type"
                class="block text-sm font-medium leading-6 text-gray-900"
              >
                جۆری کۆدەکە دەستنیشان بکە
              </label>
              <div class="mt-2">
                <select
                  id="code_type"
                  v-model="form.code_type"
                  name="code_type"
                  class="form-select"
                >
                  <option :value="null">جۆری کۆدەکە دەستنیشان بکە</option>
                  <option value="کارتی نیشتیمانی">کارتی نیشتیمانی</option>
                  <option value="پاسپۆرت">پاسپۆرت</option>
                </select>
              </div>
            </div>

            <div class="mb-3">
              <label
                for="code"
                class="block text-sm font-medium leading-6 text-gray-900"
                >ژمارەی کۆد</label
              >
              <div class="mt-2">
                <input
                  v-model="form.code"
                  type="text"
                  name="code"
                  id="code"
                  class="form-control"
                  placeholder="ژمارەی کۆد"
                />
              </div>
            </div>

            <button
              type="submit"
              class="mt-3 bg-sm-green rounded-md px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            >
              چوونە ژوورەوە
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped></style>
