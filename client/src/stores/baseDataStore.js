import { ref } from 'vue'
import { defineStore } from 'pinia'
import axios from 'axios'

export const useBaseDataStore = defineStore('BaseDataStore', () => {
  const cities = ref([])
  const code_types = ref([])
  const bloodGroups = ref(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB-', 'AB+'])
  const maritalOptions = ref(['Single', 'Maried'])

  async function get() {
    axios.get('base-data').then((response) => {
      cities.value = response.data.cities
      code_types.value = response.data.code_types
    })
  }
  async function store(payload) {
    //send POST $payload request
  }
  async function show(id) {
    //send get $id request
  }
  async function update(payload) {
    //send update(payload) request
  }
  async function deleteRecord(id) {
    //send delete(id)request
  }

  return {
    cities,
    code_types,
    bloodGroups,
    maritalOptions,
    store,
    get,
    show,
    update,
    deleteRecord,
  }
})
