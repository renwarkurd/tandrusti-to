import axios from 'axios'

const instance = axios.create({
  headers: {
    Accept: 'application/json'
  },
})
window.axiosBase = instance

axios.defaults.baseURL = 'http://127.0.0.1:8000/api/'

axios.defaults.withCredentials = true
axios.defaults.headers.common['Accept'] = 'application/json'

