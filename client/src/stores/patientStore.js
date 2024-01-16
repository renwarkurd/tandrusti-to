import { ref } from 'vue'
import { defineStore } from 'pinia'
import axios from 'axios'

export const usePatientStore = defineStore('PatientStore', () => {
  const patients = ref([])
  const patient = ref({})

  async function show(code) {
    await axios.get(`view/patient/${code}`).then((response) => {
      patient.value = response.data
    })
  }

  return {
    patients,
    patient,
    show,
  }
})
