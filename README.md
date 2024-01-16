 # 🧑‍⚕️Tandrusti To 👩‍⚕️

- 💾  RESTful API for health care providers to implement in their current software for the purpose of centralzing patient data.
- 🌀 Web Portal to view the patient data via Unique Patient Code.
- 🕳️ Web Portal to record patient data for those who don't have system yet.
- 🎬 **DEMO:** [www.tandrustyto.smart.krd](https://tandrustyto.smart.krd/) 🎬

<br>
<br>

# 🛰️ API Documentation 🤖
<!-- 📡 -->

## ⛓️ Show Patient By Code

Get the patient biography, histories, operations, diagnoses, physiotherapies, radiology results, laboratory results, general notes and medications.

🔗 **URL** : `https://tandrustyto.smart.krd/api/provider/patient/{patientCode}`

📩 **Method** : `GET`

📦 **Header Accept** : `Application\Json`

🗝️ **Auth** : Bearer token

####  Response Sample Example :

<details>
  <summary><i>Click here to show the example</i></summary>
  
```json
{
    "id": 1,
    "user_id": 1,
    "first_name": "ئاڵێ",
    "middle_name": "ئاوات",
    "last_name": "عمر",
    "full_name": "ئاڵێ ئاوات عمر",
    "code": "98387412381721",
    "code_type": {
        "id": 1,
        "name": "کارتی نیشتمانی"
    },
    "gender": 1,
    "dob_year": "1999",
    "dob_month": "14",
    "dob_day": "04",
    "dob": "2001-06-27",
    "calculated_age": {
        "y": 22,
        "m": 6,
        "d": 20
    },
    "occupation": "کارمەند",
    "address": "ئازادی",
    "contact_1": "07701112233",
    "contact_2": "07501112233",
    "marital_status": "Single",
    "blood_group": "B+",
    "spouse_fullname": null,
    "spouse_dob": null,
    "spouse_contact": null,
    "spouse_occupation": null,
    "input_date": "2024-01-15",
    "created_at": "2024-01-15 15:04:42",
    "city_id": 15,
    "city": {
        "id": 15,
        "name": "سلێمانی"
    },
    "histories": [
        {
            "id": 12,
            "chief_complaint": "Tempore minus dignissimos sit.",
            "cheif_complaint_duration": "dolores",
            "hopi": "Est necesam.",
            "past_medical_history": "Aut ut rerum quo. Dolorem eius laudantium et.",
            "surgical_history": "Illo soluuatur tenetur.",
            "family_history": "Accusantium iptempora repelptas excepturi.",
            "drug_history": "Vel est consequa fuga ut eum.",
            "allergy_history": "Natus totam t perferendis.",
            "social_history": "Labore impa necessitatibus voluptatibus.",
            "history_gpd_g": 5,
            "history_gpd_p": 4,
            "history_gpd_a": 1,
            "history_gpd_d": 1,
            "history_menstrual": "",
            "history_edd": null,
            "history_lmp": null,
            "history_gestational_age": "",
            "note": "",
            "input_date": "2024-01-15",
            "created_at": "2024-01-15 15:04:42",
            "user": {
                "id": 1,
                "name": "نەخۆشخانەی گشتی",
                "username": "hospital_user1",
                "email": null,
                "created_at": "2024-01-15 15:04:42"
            }
        }
    ],
    "diagnosis": [
        {
            "id": 3,
            "description": "Diagnosis example.",
            "input_date": "2024-01-15",
            "created_at": "2024-01-15 15:04:42",
            "user": {
                "id": 1,
                "name": "نەخۆشخانەی گشتی",
                "username": "hospital_user1",
                "email": null,
                "created_at": "2024-01-15 15:04:42"
            }
        }
    ],
    "operations": [
        {
            "id": 7,
            "description": "Frist Operation Example.",
            "input_date": "2024-01-15",
            "created_at": "2024-01-15 15:04:42",
            "user": {
                "id": 1,
                "name": "نەخۆشخانەی گشتی",
                "username": "hospital_user1",
                "email": null,
                "created_at": "2024-01-15 15:04:42"
            }
        }
    ],
    "medications": [
        {
            "id": 13,
            "description": "Paracetamol 1/1.",
            "input_date": "2024-01-15",
            "created_at": "2024-01-15 15:04:42",
            "user": {
                "id": 1,
                "name": "نەخۆشخانەی گشتی",
                "username": "hospital_user1",
                "email": null,
                "created_at": "2024-01-15 15:04:42"
            }
        }
    ],
    "physiotherapies": [
        {
            "id": 9,
            "description": "TENS.",
            "input_date": "2024-01-15",
            "created_at": "2024-01-15 15:04:42",
            "user": {
                "id": 1,
                "name": "نەخۆشخانەی گشتی",
                "username": "hospital_user1",
                "email": null,
                "created_at": "2024-01-15 15:04:42"
            }
        }
    ],
    "laboratory_results": [
        {
            "id": 1,
            "filename": "11.pdf",
            "input_date": "2024-01-15",
            "created_at": "2024-01-15 15:04:42",
            "user": {
                "id": 1,
                "name": "نەخۆشخانەی گشتی",
                "username": "hospital_user1",
                "email": null,
                "created_at": "2024-01-15 15:04:42"
            }
        }
    ],
    "radiology_results": [
        {
            "id": 14,
            "filename": "file2.pdf",
            "input_date": "2024-01-15",
            "created_at": "2024-01-15 15:04:43",
            "user": {
                "id": 1,
                "name": "نەخۆشخانەی گشتی",
                "username": "hospital_user1",
                "email": null,
                "created_at": "2024-01-15 15:04:42"
            }
        },
        {
            "id": 15,
            "filename": "file1.jpg",
            "input_date": "2024-01-15",
            "created_at": "2024-01-15 15:04:43",
            "user": {
                "id": 1,
                "name": "نەخۆشخانەی گشتی",
                "username": "hospital_user1",
                "email": null,
                "created_at": "2024-01-15 15:04:42"
            }
        }
    ],
    "general_notes": [
        {
            "id": 5,
            "description": "general note example.",
            "input_date": "2024-01-15",
            "created_at": "2024-01-15 15:04:43",
            "user": {
                "id": 1,
                "name": "نەخۆشخانەی گشتی",
                "username": "hospital_user1",
                "email": null,
                "created_at": "2024-01-15 15:04:42"
            }
        }
    ]
}
```
</details>

## ⛓️ Create Patient Record

Register patient with biography data.

🔗 **URL** : `https://tandrustyto.smart.krd/api/provider/patient`

📨 **Method** : `POST`

📦 **Header Accept** : `Application\Json`

🗝️ **Auth** : Bearer token

**Request Payload Example** :

<details>
  <summary><i>Click here to show the example</i></summary>
  
```json
{
    "code": 98387412381721, // required
    "code_type": 1, // required code_type_id is provided with another api
    "first_name": "ئاڵێ", // required
    "middle_name": "ئاوات", // required
    "last_name": "عمر", // required
    "gender": 0, // required 0: male, 1: female
    "dob_year": 1999, // required
    "dob_month": 4, // required
    "dob_day": 14, // required
    "city_id": 15, // not required, city_id is provided with another api
    "occupation": "کارمەند", // not required
    "address": "ئازادی", // not required
    "contact_1": "07701112233", // not required
    "contact_2": "07501112233", // not required
    "marital_status": "Single", // not required
    "blood_group": "B+", // not required
    "spouse_fullname": null, // not required
    "spouse_dob": null, // not required
    "spouse_contact": null, // not required
    "spouse_occupation": null // not required
}
```
</details>

## ⛓️ Create Patient History Record

Create history record for specified patient.

🔗 **URL** : `https://tandrustyto.smart.krd/api/provider/patient/history`

📨 **Method** : `POST`

📦 **Header Accept** : `Application\Json`

🗝️ **Auth** : Bearer token

**Request Payload Example** :

+ At least one key of the history data is required.

+ Patient biography data must be included.

> [!CAUTION]
>  ⚠️ This API will create the patient if the patient is not already created..

<details>
  <summary><i>Click here to show the example</i></summary>
  
```json
{
    "patient": {
        "code": 98387412381721, // required
        "code_type": 1, // required code_type_id is provided with another api
        "first_name": "ئاڵێ", // required
        "middle_name": "ئاوات", // required
        "last_name": "عمر", // required
        "gender": 0, // required 0: male, 1: female
        "dob_year": 1999, // required
        "dob_month": 4, // required
        "dob_day": 14, // required
        "city_id": 15, // not required, city_id is provided with another api
        "occupation": "کارمەند", // not required
        "address": "ئازادی", // not required
        "contact_1": "07701112233", // not required
        "contact_2": "07501112233", // not required
        "marital_status": "Single", // not required
        "blood_group": "B+", // not required
        "spouse_fullname": null, // not required
        "spouse_dob": null, // not required
        "spouse_contact": null, // not required
        "spouse_occupation": null // not required
    },
    "chief_complaint": "",
    "cheif_complaint_duration": "",
    "hopi": "",
    "past_medical_history": "",
    "surgical_history": "",
    "family_history": "",
    "drug_history": "",
    "allergy_history": "",
    "social_history": "",
    "history_gpd_g": "",
    "history_gpd_p": "",
    "history_gpd_a": "",
    "history_gpd_d": "",
    "history_menstrual": "",
    "history_edd": "",
    "history_lmp": "",
    "history_gestational_age": "",
    "note": ""
}
```
</details>

## ⛓️ Create Patient Diagnosis Record

Create diagnosis record for specified patient.

🔗 **URL** : `https://tandrustyto.smart.krd/api/provider/patient/diagnosis`

📨 **Method** : `POST`

📦 **Header Accept** : `Application\Json`

🗝️ **Auth** : Bearer token

**Request Payload Example** :

+ Description key is required.
+ Patient biography data must be included.

> [!CAUTION]
> ⚠️This API will create the patient if the patient is not already created.

<details>
  <summary><i>Click here to show the example</i></summary>
  
```json
{
    "patient": {
        "code": 98387412381721, // required
        "code_type": 1, // required code_type_id is provided with another api
        "first_name": "ئاڵێ", // required
        "middle_name": "ئاوات", // required
        "last_name": "عمر", // required
        "gender": 0, // required 0: male, 1: female
        "dob_year": 1999, // required
        "dob_month": 4, // required
        "dob_day": 14, // required
        "city_id": 15, // not required, city_id is provided with another api
        "occupation": "کارمەند", // not required
        "address": "ئازادی", // not required
        "contact_1": "07701112233", // not required
        "contact_2": "07501112233", // not required
        "marital_status": "Single", // not required
        "blood_group": "B+", // not required
        "spouse_fullname": null, // not required
        "spouse_dob": null, // not required
        "spouse_contact": null, // not required
        "spouse_occupation": null // not required
    },
    "description": ""
}
```
</details>

## ⛓️ Create Patient Operation Record

Create operation record for specified patient.

🔗 **URL** : `https://tandrustyto.smart.krd/api/provider/patient/operation`

📨 **Method** : `POST`

📦 **Header Accept** : `Application\Json`

🗝️ **Auth** : Bearer token

**Request Payload Example** :

+ Description key is required.
+ Patient biography data must be included.

> [!CAUTION]
> ⚠️ This API will create the patient if the patient is not already created.

<details>
  <summary><i>Click here to show the example</i></summary>
  
```json
{
    "patient": {
        "code": 98387412381721, // required
        "code_type": 1, // required code_type_id is provided with another api
        "first_name": "ئاڵێ", // required
        "middle_name": "ئاوات", // required
        "last_name": "عمر", // required
        "gender": 0, // required 0: male, 1: female
        "dob_year": 1999, // required
        "dob_month": 4, // required
        "dob_day": 14, // required
        "city_id": 15, // not required, city_id is provided with another api
        "occupation": "کارمەند", // not required
        "address": "ئازادی", // not required
        "contact_1": "07701112233", // not required
        "contact_2": "07501112233", // not required
        "marital_status": "Single", // not required
        "blood_group": "B+", // not required
        "spouse_fullname": null, // not required
        "spouse_dob": null, // not required
        "spouse_contact": null, // not required
        "spouse_occupation": null // not required
    },
    "description": ""
}
```
</details>

## ⛓️ Create Patient Physiotherapy Record

Create physiotherapy record for specified patient.

🔗 **URL** : `https://tandrustyto.smart.krd/api/provider/patient/physiotherapy`

📨 **Method** : `POST`

📦 **Header Accept** : `Application\Json`

🗝️ **Auth** : Bearer token

**Request Payload Example** :

+ Description key is required.
+ Patient biography data must be included.

> [!CAUTION]
> ⚠️ This API will create the patient if the patient is not already created.

<details>
  <summary><i>Click here to show the example</i></summary>
  
```json
{
    "patient": {
        "code": 98387412381721, // required
        "code_type": 1, // required code_type_id is provided with another api
        "first_name": "ئاڵێ", // required
        "middle_name": "ئاوات", // required
        "last_name": "عمر", // required
        "gender": 0, // required 0: male, 1: female
        "dob_year": 1999, // required
        "dob_month": 4, // required
        "dob_day": 14, // required
        "city_id": 15, // not required, city_id is provided with another api
        "occupation": "کارمەند", // not required
        "address": "ئازادی", // not required
        "contact_1": "07701112233", // not required
        "contact_2": "07501112233", // not required
        "marital_status": "Single", // not required
        "blood_group": "B+", // not required
        "spouse_fullname": null, // not required
        "spouse_dob": null, // not required
        "spouse_contact": null, // not required
        "spouse_occupation": null // not required
    },
    "description": ""
}
```
</details>

## ⛓️ Create Patient General Note Record

Create general note record for specified patient (In case the patient is not within the other categories).

🔗 **URL** : `https://tandrustyto.smart.krd/api/provider/patient/general-note`

📨 **Method** : `POST`

📦 **Header Accept** : `Application\Json`

🗝️ **Auth** : Bearer token

**Request Payload Example** :

+ Description key is required.
+ Patient biography data must be included.

> [!CAUTION]
> ⚠️ This API will create the patient if the patient is not already created.

<details>
  <summary><i>Click here to show the example</i></summary>
  
```json
{
    "patient": {
        "code": 98387412381721, // required
        "code_type": 1, // required code_type_id is provided with another api
        "first_name": "ئاڵێ", // required
        "middle_name": "ئاوات", // required
        "last_name": "عمر", // required
        "gender": 0, // required 0: male, 1: female
        "dob_year": 1999, // required
        "dob_month": 4, // required
        "dob_day": 14, // required
        "city_id": 15, // not required, city_id is provided with another api
        "occupation": "کارمەند", // not required
        "address": "ئازادی", // not required
        "contact_1": "07701112233", // not required
        "contact_2": "07501112233", // not required
        "marital_status": "Single", // not required
        "blood_group": "B+", // not required
        "spouse_fullname": null, // not required
        "spouse_dob": null, // not required
        "spouse_contact": null, // not required
        "spouse_occupation": null // not required
    },
    "description": ""
}
```
</details>

## ⛓️ Create Patient Medication Record

Create medication record for specified patient.

🔗 **URL** : `https://tandrustyto.smart.krd/api/provider/patient/medication`

📨 **Method** : `POST`

📦 **Header Accept** : `Application\Json`

🗝️ **Auth** : Bearer token

**Request Payload Example** :

+ Description key is required.
+ Patient biography data must be included.

> [!CAUTION]
> ⚠️ This API will create the patient if the patient is not already created.

<details>
  <summary><i>Click here to show the example</i></summary>
  
```json
{
    "patient": {
        "code": 98387412381721, // required
        "code_type": 1, // required code_type_id is provided with another api
        "first_name": "ئاڵێ", // required
        "middle_name": "ئاوات", // required
        "last_name": "عمر", // required
        "gender": 0, // required 0: male, 1: female
        "dob_year": 1999, // required
        "dob_month": 4, // required
        "dob_day": 14, // required
        "city_id": 15, // not required, city_id is provided with another api
        "occupation": "کارمەند", // not required
        "address": "ئازادی", // not required
        "contact_1": "07701112233", // not required
        "contact_2": "07501112233", // not required
        "marital_status": "Single", // not required
        "blood_group": "B+", // not required
        "spouse_fullname": null, // not required
        "spouse_dob": null, // not required
        "spouse_contact": null, // not required
        "spouse_occupation": null // not required
    },
    "description": ""
}
```
</details>

## ⛓️ Create Patient Laboratory Result Record

Create laboratory result record for specified patient.

🔗 **URL** : `https://tandrustyto.smart.krd/api/provider/patient/laboratory`

📨 **Method** : `POST`

📦 **Header Accept** : `Application\Json`

🗝️ **Auth** : Bearer token

**Request Payload Example** :

+ Files is array of multiple files and should be sent via FormData. 
+ Patient biography data must be included.

> [!CAUTION]
> ⚠️ This API will create the patient if the patient is not already created.

<details>
  <summary><i>Click here to show the example</i></summary>
  
```json
{
    "patient": {
        "code": 98387412381721, // required
        "code_type": 1, // required code_type_id is provided with another api
        "first_name": "ئاڵێ", // required
        "middle_name": "ئاوات", // required
        "last_name": "عمر", // required
        "gender": 0, // required 0: male, 1: female
        "dob_year": 1999, // required
        "dob_month": 4, // required
        "dob_day": 14, // required
        "city_id": 15, // not required, city_id is provided with another api
        "occupation": "کارمەند", // not required
        "address": "ئازادی", // not required
        "contact_1": "07701112233", // not required
        "contact_2": "07501112233", // not required
        "marital_status": "Single", // not required
        "blood_group": "B+", // not required
        "spouse_fullname": null, // not required
        "spouse_dob": null, // not required
        "spouse_contact": null, // not required
        "spouse_occupation": null // not required
    },
    "files": [] // FormData of multiple files
}
```
</details>

## ⛓️ Create Patient Radiology Result Record

Create radiology result record for specified patient.

🔗 **URL** : `https://tandrustyto.smart.krd/api/provider/patient/radiology`

📨 **Method** : `POST`

📦 **Header Accept** : `Application\Json`

🗝️ **Auth** : Bearer token

**Request Payload Example** :

+ Files is array of multiple files and should be sent via FormData. 
+ Patient biography data must be included.

> [!CAUTION]
> ⚠️ This API will create the patient if the patient is not already created.

<details>
  <summary><i>Click here to show the example</i></summary>
    
  ```json
  {
      "patient": {
          "code": 98387412381721, // required
          "code_type": 1, // required code_type_id is provided with another api
          "first_name": "ئاڵێ", // required
          "middle_name": "ئاوات", // required
          "last_name": "عمر", // required
          "gender": 0, // required 0: male, 1: female
          "dob_year": 1999, // required
          "dob_month": 4, // required
          "dob_day": 14, // required
          "city_id": 15, // not required, city_id is provided with another api
          "occupation": "کارمەند", // not required
          "address": "ئازادی", // not required
          "contact_1": "07701112233", // not required
          "contact_2": "07501112233", // not required
          "marital_status": "Single", // not required
          "blood_group": "B+", // not required
          "spouse_fullname": null, // not required
          "spouse_dob": null, // not required
          "spouse_contact": null, // not required
          "spouse_occupation": null // not required
      },
      "files": [] // FormData of multiple files
  }
  ```
</details>

## ⛓️ Get Base Data List

Get list of code types and cities.

🔗 **URL** : `https://tandrustyto.smart.krd/api/provider/base-data`

📩 **Method** : `GET`

📦 **Header Accept** : `Application\Json`

🗝️ **Auth** : Bearer token

#### Response Sample :

<details>
  <summary><i>Click here to show the sample</i></summary>
  
```json
{
    "code_types": [
        {
            "id": 1,
            "name": "کارتی نیشتمانی"
        },
        {
            "id": 2,
            "name": "پاسپۆرت"
        }
    ],
    "cities": [
        {
            "id": 1,
            "name": "Baghdad"
        },
        {
            "id": 2,
            "name": "Basrah"
        },
        {
            "id": 3,
            "name": "Al Mawsil al Jadidah"
        },
        {
            "id": 4,
            "name": "Al Basrah al Qadimah"
        },
        {
            "id": 5,
            "name": "Mosul"
        },
        {
            "id": 6,
            "name": "Erbil"
        },
        {
            "id": 7,
            "name": "Abu Ghurayb"
        },
        {
            "id": 8,
            "name": "As Sulaymaniyah"
        },
        {
            "id": 9,
            "name": "Kirkuk"
        },
        {
            "id": 10,
            "name": "Najaf"
        },
        {
            "id": 11,
            "name": "Karbala"
        },
        {
            "id": 12,
            "name": "Nasiriyah"
        },
        {
            "id": 13,
            "name": "Al Amarah"
        },
        {
            "id": 14,
            "name": "Ad Diwaniyah"
        },
        {
            "id": 15,
            "name": "Al Kut"
        },
        {
            "id": 16,
            "name": "Al Hillah"
        },
        {
            "id": 17,
            "name": "Dihok"
        },
        {
            "id": 18,
            "name": "Ramadi"
        },
        {
            "id": 19,
            "name": "Al Fallujah"
        },
        {
            "id": 20,
            "name": "Samarra"
        },
        {
            "id": 21,
            "name": "As Samawah"
        },
        {
            "id": 22,
            "name": "Baqubah"
        },
        {
            "id": 23,
            "name": "Sinah"
        },
        {
            "id": 24,
            "name": "Az Zubayr"
        },
        {
            "id": 25,
            "name": "Kufa"
        },
        {
            "id": 26,
            "name": "Umm Qasr"
        },
        {
            "id": 27,
            "name": "Al Faw"
        },
        {
            "id": 28,
            "name": "Zaxo"
        },
        {
            "id": 29,
            "name": "Al Harithah"
        },
        {
            "id": 30,
            "name": "Ash Shatrah"
        },
        {
            "id": 31,
            "name": "Al Hayy"
        },
        {
            "id": 32,
            "name": "Jamjamal"
        },
        {
            "id": 33,
            "name": "Khalis"
        },
        {
            "id": 34,
            "name": "Tozkhurmato"
        },
        {
            "id": 35,
            "name": "Ash Shamiyah"
        },
        {
            "id": 36,
            "name": "Al Hindiyah"
        },
        {
            "id": 37,
            "name": "Halabjah"
        },
        {
            "id": 38,
            "name": "Al Miqdadiyah"
        },
        {
            "id": 39,
            "name": "Al-Hamdaniya"
        },
        {
            "id": 40,
            "name": "Ar Rumaythah"
        },
        {
            "id": 41,
            "name": "Koysinceq"
        },
        {
            "id": 42,
            "name": "Al Aziziyah"
        },
        {
            "id": 43,
            "name": "Al Musayyib"
        },
        {
            "id": 44,
            "name": "Tikrit"
        },
        {
            "id": 45,
            "name": "As Suwayrah"
        },
        {
            "id": 46,
            "name": "Balad"
        },
        {
            "id": 47,
            "name": "Sinjar"
        },
        {
            "id": 48,
            "name": "Imam Qasim"
        },
        {
            "id": 49,
            "name": "Bayji"
        },
        {
            "id": 50,
            "name": "Hit"
        },
        {
            "id": 51,
            "name": "Hadithah"
        },
        {
            "id": 52,
            "name": "Nahiyat Ghammas"
        },
        {
            "id": 53,
            "name": "Nahiyat Saddat al Hindiyah"
        },
        {
            "id": 54,
            "name": "Kifri"
        },
        {
            "id": 55,
            "name": "Mandali"
        },
        {
            "id": 56,
            "name": "Baynjiwayn"
        },
        {
            "id": 57,
            "name": "Anah"
        },
        {
            "id": 58,
            "name": "Ad Dujayl"
        },
        {
            "id": 59,
            "name": "Batufe"
        },
        {
            "id": 60,
            "name": "Tallkayf"
        },
        {
            "id": 61,
            "name": "Al Mishkhab"
        },
        {
            "id": 62,
            "name": "Aqrah"
        },
        {
            "id": 63,
            "name": "Ruwandiz"
        },
        {
            "id": 64,
            "name": "Nahiyat ash Shinafiyah"
        },
        {
            "id": 65,
            "name": "Ar Rutbah"
        },
        {
            "id": 66,
            "name": "Afak"
        },
        {
            "id": 67,
            "name": "Nahiyat al Fuhud"
        },
        {
            "id": 68,
            "name": "Anat al Qadimah"
        },
        {
            "id": 69,
            "name": "Ali al Gharbi"
        },
        {
            "id": 70,
            "name": "Rawah"
        }
    ]
}
```
</details>
