import axios from 'axios'
import { ElMessage } from 'element-plus'

const instance = axios.create({
  headers: {
    Accept: 'application/json',
  },
})

axios.defaults.baseURL = import.meta.env.VITE_API_ENDPOINT
axios.defaults.headers.common.Accept = 'application/json'

window.axios = instance

axios.interceptors.response.use(
  function (response) {
    return response
  },
  function (error) {
    // if Unauthorized then logout user
    if (error.request.status == 401) {
      // logout
    } else {
      if (error.response.data.errors) {
        let errors = '<li>' + Object.values(error.response.data.errors).join('</li><li>') + '</li>'
        ElMessage({
          dangerouslyUseHTMLString: true,
          message: errors,
          type: 'error',
          duration: 4000,
        })
      } else {
        ElMessage({
          dangerouslyUseHTMLString: true,
          message: error.response.data.message,
          type: 'error',
          duration: 4000,
        })
      }
    }
    return Promise.reject(error)
  },
)
