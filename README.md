# Tandrusti To

-   RESTful API for health care providers to implement in their current software for the purpose of centralzing patient data.
-   Web Portal to view the patient data via Unique Patient Code.
-   Web Portal to record patient data for those who don't have system yet.

<br>
<br>

# API Documentation

## Show Patient By Code

Get the patient biography, histories, operations, diagnoses, physiotherapies, radiology results, laboratory results, general notes and medications.

**URL** : `https://tandrustyto.smart.krd/api/provider/patient/{patientCode}`

**Method** : `GET`

**Header Accept** : `Application\Json`

**Auth** : Bearer token

#### Response Sample Example :

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
                "name": "admin",
                "username": "admin",
                "email": null,
                "created_at": "2024-01-15T15:04:42.000000Z"
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
                "name": "admin",
                "username": "admin",
                "email": null,
                "created_at": "2024-01-15T15:04:42.000000Z"
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
                "name": "admin",
                "username": "admin",
                "email": null,
                "created_at": "2024-01-15T15:04:42.000000Z"
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
                "name": "admin",
                "username": "admin",
                "email": null,
                "created_at": "2024-01-15T15:04:42.000000Z"
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
                "name": "admin",
                "username": "admin",
                "email": null,
                "created_at": "2024-01-15T15:04:42.000000Z"
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
                "name": "admin",
                "username": "admin",
                "email": null,
                "created_at": "2024-01-15T15:04:42.000000Z"
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
                "name": "admin",
                "username": "admin",
                "email": null,
                "created_at": "2024-01-15T15:04:42.000000Z"
            }
        },
        {
            "id": 15,
            "filename": "file1.jpg",
            "input_date": "2024-01-15",
            "created_at": "2024-01-15 15:04:43",
            "user": {
                "id": 1,
                "name": "admin",
                "username": "admin",
                "email": null,
                "created_at": "2024-01-15T15:04:42.000000Z"
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
                "name": "admin",
                "username": "admin",
                "email": null,
                "created_at": "2024-01-15T15:04:42.000000Z"
            }
        }
    ]
}
```

## Create Patient Record

Register patient with biography data.

**URL** : `https://tandrustyto.smart.krd/api/provider/patient`

**Method** : `POST`

**Header Accept** : `Application\Json`

**Auth** : Bearer token

**Request Payload Example** :

```json
{
    "code": 98387412381721, // required,
    "code_type": 1, // required, code_type_id is provided with another api,
    "first_name": "ئاڵێ", // required
    "middle_name": "ئاوات", // required
    "last_name": "عمر", // required
    "gender": 0, // required, 0: male, 1: female
    "dob_year": 1999, // required,
    "dob_month": 4, // required,
    "dob_day": 14, // required,
    "city_id": 15, // not required, city_id is provided with another api,
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

## Create Patient History Record

Create history record for specified patient.

**URL** : `https://tandrustyto.smart.krd/api/provider/patient/history`

**Method** : `POST`

**Header Accept** : `Application\Json`

**Auth** : Bearer token

**Request Payload Example** :

At least one key of the history data is required. Patient biography data must be included. This API will create the patient if the patient is not already created.

```json
{
    "patient": {
        "code": 98387412381721, // required,
        "code_type": 1, // required, code_type_id is provided with another api,
        "first_name": "ئاڵێ", // required
        "middle_name": "ئاوات", // required
        "last_name": "عمر", // required
        "gender": 0, // required, 0: male, 1: female
        "dob_year": 1999, // required,
        "dob_month": 4, // required,
        "dob_day": 14, // required,
        "city_id": 15, // not required, city_id is provided with another api,
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

## Create Patient Diagnosis Record

Create diagnosis record for specified patient.

**URL** : `https://tandrustyto.smart.krd/api/provider/patient/diagnosis`

**Method** : `POST`

**Header Accept** : `Application\Json`

**Auth** : Bearer token

**Request Payload Example** :

Description key is required. Patient biography data must be included. This API will create the patient if the patient is not already created.

```json
{
    "patient": {
        "code": 98387412381721, // required,
        "code_type": 1, // required, code_type_id is provided with another api,
        "first_name": "ئاڵێ", // required
        "middle_name": "ئاوات", // required
        "last_name": "عمر", // required
        "gender": 0, // required, 0: male, 1: female
        "dob_year": 1999, // required,
        "dob_month": 4, // required,
        "dob_day": 14, // required,
        "city_id": 15, // not required, city_id is provided with another api,
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

## Create Patient Operation Record

Create operation record for specified patient.

**URL** : `https://tandrustyto.smart.krd/api/provider/patient/operation`

**Method** : `POST`

**Header Accept** : `Application\Json`

**Auth** : Bearer token

**Request Payload Example** :

Description key is required. Patient biography data must be included. This API will create the patient if the patient is not already created.

```json
{
    "patient": {
        "code": 98387412381721, // required,
        "code_type": 1, // required, code_type_id is provided with another api,
        "first_name": "ئاڵێ", // required
        "middle_name": "ئاوات", // required
        "last_name": "عمر", // required
        "gender": 0, // required, 0: male, 1: female
        "dob_year": 1999, // required,
        "dob_month": 4, // required,
        "dob_day": 14, // required,
        "city_id": 15, // not required, city_id is provided with another api,
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

## Create Patient Physiotherapy Record

Create physiotherapy record for specified patient.

**URL** : `https://tandrustyto.smart.krd/api/provider/patient/physiotherapy`

**Method** : `POST`

**Header Accept** : `Application\Json`

**Auth** : Bearer token

**Request Payload Example** :

Description key is required. Patient biography data must be included. This API will create the patient if the patient is not already created.

```json
{
    "patient": {
        "code": 98387412381721, // required,
        "code_type": 1, // required, code_type_id is provided with another api,
        "first_name": "ئاڵێ", // required
        "middle_name": "ئاوات", // required
        "last_name": "عمر", // required
        "gender": 0, // required, 0: male, 1: female
        "dob_year": 1999, // required,
        "dob_month": 4, // required,
        "dob_day": 14, // required,
        "city_id": 15, // not required, city_id is provided with another api,
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

## Create Patient General Note Record

Create general note record for specified patient (In case the patient is not within the other categories).

**URL** : `https://tandrustyto.smart.krd/api/provider/patient/general-note`

**Method** : `POST`

**Header Accept** : `Application\Json`

**Auth** : Bearer token

**Request Payload Example** :

Description key is required. Patient biography data must be included. This API will create the patient if the patient is not already created.

```json
{
    "patient": {
        "code": 98387412381721, // required,
        "code_type": 1, // required, code_type_id is provided with another api,
        "first_name": "ئاڵێ", // required
        "middle_name": "ئاوات", // required
        "last_name": "عمر", // required
        "gender": 0, // required, 0: male, 1: female
        "dob_year": 1999, // required,
        "dob_month": 4, // required,
        "dob_day": 14, // required,
        "city_id": 15, // not required, city_id is provided with another api,
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

## Create Patient Medication Record

Create medication record for specified patient.

**URL** : `https://tandrustyto.smart.krd/api/provider/patient/medication`

**Method** : `POST`

**Header Accept** : `Application\Json`

**Auth** : Bearer token

**Request Payload Example** :

Description key is required. Patient biography data must be included. This API will create the patient if the patient is not already created.

```json
{
    "patient": {
        "code": 98387412381721, // required,
        "code_type": 1, // required, code_type_id is provided with another api,
        "first_name": "ئاڵێ", // required
        "middle_name": "ئاوات", // required
        "last_name": "عمر", // required
        "gender": 0, // required, 0: male, 1: female
        "dob_year": 1999, // required,
        "dob_month": 4, // required,
        "dob_day": 14, // required,
        "city_id": 15, // not required, city_id is provided with another api,
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


## Create Patient Laboratory Result Record

Create laboratory result record for specified patient.

**URL** : `https://tandrustyto.smart.krd/api/provider/patient/laboratory`

**Method** : `POST`

**Header Accept** : `Application\Json`

**Auth** : Bearer token

**Request Payload Example** :

Files is array of multiple files and should be sent via FormData. Patient biography data must be included. This API will create the patient if the patient is not already created.

```json
{
    "patient": {
        "code": 98387412381721, // required,
        "code_type": 1, // required, code_type_id is provided with another api,
        "first_name": "ئاڵێ", // required
        "middle_name": "ئاوات", // required
        "last_name": "عمر", // required
        "gender": 0, // required, 0: male, 1: female
        "dob_year": 1999, // required,
        "dob_month": 4, // required,
        "dob_day": 14, // required,
        "city_id": 15, // not required, city_id is provided with another api,
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
    "files": [] // FormData of multiple files,
}
```

## Create Patient Radiology Result Record

Create radiology result record for specified patient.

**URL** : `https://tandrustyto.smart.krd/api/provider/patient/radiology`

**Method** : `POST`

**Header Accept** : `Application\Json`

**Auth** : Bearer token

**Request Payload Example** :

Files is array of multiple files and should be sent via FormData. Patient biography data must be included. This API will create the patient if the patient is not already created.

```json
{
    "patient": {
        "code": 98387412381721, // required,
        "code_type": 1, // required, code_type_id is provided with another api,
        "first_name": "ئاڵێ", // required
        "middle_name": "ئاوات", // required
        "last_name": "عمر", // required
        "gender": 0, // required, 0: male, 1: female
        "dob_year": 1999, // required,
        "dob_month": 4, // required,
        "dob_day": 14, // required,
        "city_id": 15, // not required, city_id is provided with another api,
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
    "files": [] // FormData of multiple files,
}
```