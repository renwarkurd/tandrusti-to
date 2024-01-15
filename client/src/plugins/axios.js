import axios from 'axios'

const instance = axios.create({
  headers: {
    Accept: 'application/json'
  },
})

axios.defaults.baseURL = 'http://127.0.0.1:8000/api/'
axios.defaults.headers.common.Accept = 'application/json'

window.axios = instance

