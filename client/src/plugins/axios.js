import axios from 'axios'

const instance = axios.create({
  headers: {
    Accept: 'application/json'
  },
})

axios.defaults.baseURL = import.meta.env.VITE_API_ENDPOINT
axios.defaults.headers.common.Accept = 'application/json'

window.axios = instance

