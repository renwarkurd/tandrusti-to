import { ref } from 'vue'
import { defineStore } from 'pinia'
import axios from 'axios'

export const usePatientStore = defineStore('PatientStore', () => {
  //list of all patients
  const patients = ref([])

  //singular, CRUD form purpose
  const patient = ref({})
  async function get() {
    //send get all axios request...
  }
  async function store(payload) {
    //send POST $payload request
  }
  async function show(id) {
    axios.get(`patient/${id}`).then((response) => {
      patient.value = response.data
    })
  }
  async function update(payload) {
    //send update(payload) request
  }
  async function deleteRecord(id) {
    //send delete(id)request
  }

  return {
    patients,
    patient,
    store,
    get,
    show,
    update,
    deleteRecord,
  }
})
