import { ref } from 'vue'
import { defineStore } from 'pinia'
import axios from 'axios'
import { useRoute } from 'vue-router'

export const usePatientStore = defineStore('PatientStore', () => {
  const patients = ref([])
  const patient = ref({})

  async function show(code) {
    await axios.get(`patient/${code}`).then((response) => {
      patient.value = response.data
    })
  }

  return {
    patients,
    patient,
    show,
  }
})
