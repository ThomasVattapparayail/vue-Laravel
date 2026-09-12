<template>

    <div class="about-page">

        <!-- Page Header -->
        <div class="page-header">

            <div>
                <h1>About</h1>
                <p>Manage your portfolio About page.</p>
            </div>

            <button
                v-if="!about.id"
                class="save-button"
                @click="saveAbout"
                :disabled="loading"
            >
                {{ loading ? 'Saving...' : 'Save Changes' }}
            </button>

        </div>


        <!-- Success Message -->
        <div
            v-if="message"
            class="success-message"
        >
            {{ message }}
        </div>


        <!-- Error Message -->
        <div
            v-if="error"
            class="error-message"
        >
            {{ error }}
        </div>


        <!-- ================================= -->
        <!-- ABOUT TABLE -->
        <!-- ================================= -->

        <div v-if="about.id && !editing" class="form-card">

            <div class="table-header">

                <h2>About Information</h2>

                <button
                    class="edit-button"
                    @click="editAbout"
                >
                    Edit
                </button>

            </div>


            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Programming Languages</th>
                            <th>Frameworks</th>
                            <th>Actions</th>
                        </tr>

                    </thead>


                    <tbody>

                        <tr>

                            <td>
                                {{ about.title }}
                            </td>

                            <td class="description">
                                {{ about.description }}
                            </td>

                            <td>

                                <span
                                    v-for="(language, index) in about.programming_languages"
                                    :key="index"
                                    class="tag"
                                >
                                    {{ language }}
                                </span>

                            </td>


                            <td>

                                <span
                                    v-for="(framework, index) in about.frameworks"
                                    :key="index"
                                    class="tag framework-tag"
                                >
                                    {{ framework }}
                                </span>

                            </td>


                            <td class="actions">

                                <button
                                    class="edit-button"
                                    @click="editAbout"
                                >
                                    Edit
                                </button>

                                <button
                                    class="delete-button"
                                    @click="deleteAbout"
                                    :disabled="loading"
                                >
                                    Delete
                                </button>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>


        <!-- ================================= -->
        <!-- ABOUT FORM -->
        <!-- ================================= -->

        <div
            v-if="!about.id || editing"
        >

            <!-- Form Header -->

            <div class="form-header">

                <h2>
                    {{ about.id ? 'Edit About Information' : 'Add About Information' }}
                </h2>

                <button
                    v-if="editing"
                    class="cancel-button"
                    @click="cancelEdit"
                >
                    Cancel
                </button>

            </div>


            <!-- About Information -->

            <div class="form-card">

                <h2>About Information</h2>


                <!-- Title -->

                <div class="form-group">

                    <label>Title</label>

                    <input
                        type="text"
                        v-model="about.title"
                        placeholder="About Me"
                    >

                </div>


                <!-- Description -->

                <div class="form-group">

                    <label>Description</label>

                    <textarea
                        v-model="about.description"
                        rows="6"
                        placeholder="Write something about yourself..."
                    ></textarea>

                </div>

            </div>


            <!-- Programming Languages -->

            <div class="form-card">

                <h2>Programming Languages</h2>


                <div
                    v-for="(language, index) in about.programming_languages"
                    :key="index"
                    class="skill-row"
                >

                    <input
                        type="text"
                        v-model="about.programming_languages[index]"
                        placeholder="PHP"
                    >


                    <button
                        type="button"
                        class="remove-button"
                        @click="removeLanguage(index)"
                    >
                        Remove
                    </button>

                </div>


                <button
                    type="button"
                    class="add-button"
                    @click="addLanguage"
                >
                    + Add Language
                </button>

            </div>


            <!-- Frameworks -->

            <div class="form-card">

                <h2>Frameworks</h2>


                <div
                    v-for="(framework, index) in about.frameworks"
                    :key="index"
                    class="skill-row"
                >

                    <input
                        type="text"
                        v-model="about.frameworks[index]"
                        placeholder="Laravel"
                    >


                    <button
                        type="button"
                        class="remove-button"
                        @click="removeFramework(index)"
                    >
                        Remove
                    </button>

                </div>


                <button
                    type="button"
                    class="add-button"
                    @click="addFramework"
                >
                    + Add Framework
                </button>

            </div>


            <!-- Save -->

            <div class="save-container">

                <button
                    class="save-button"
                    @click="saveAbout"
                    :disabled="loading"
                >
                    {{ loading ? 'Saving...' : 'Save Changes' }}
                </button>

            </div>

        </div>

    </div>

</template>


<script>

import axios from 'axios'


export default {

    name: 'DashboardAbout',


    data() {

        return {

            loading: false,

            message: '',

            error: '',

            editing: false,

            about: {

                title: '',

                description: '',

                programming_languages: [],

                frameworks: []

            }

        }

    },


    mounted() {

        this.getAbout()

    },


    methods: {


        // ==========================================
        // GET ABOUT
        // ==========================================

async getAbout() {
    try {
        const token = localStorage.getItem('token');

        const response = await axios.get('/api/dashboard/about', {
            headers: {
                Authorization: `Bearer ${token}`,
                Accept: 'application/json'
            }
        });

        if (response.data.data) {
            this.about = response.data.data;

            this.about.programming_languages =
                this.about.programming_languages || [];

            this.about.frameworks =
                this.about.frameworks || [];
        }

    } catch (error) {
        console.log('Status:', error.response?.status);
        console.log('Error:', error.response?.data);

        this.error = 'Unable to load About information.';
    }
},


        // ==========================================
        // EDIT
        // ==========================================

        editAbout() {

            this.editing = true

            this.message = ''

            this.error = ''

        },


        cancelEdit() {

            this.editing = false

            this.getAbout()

        },


        addLanguage() {

            this.about.programming_languages.push('')

        },


        removeLanguage(index) {

            this.about.programming_languages
                .splice(index, 1)

        },

        addFramework() {

            this.about.frameworks.push('')

        },


        removeFramework(index) {

            this.about.frameworks
                .splice(index, 1)

        },



        async saveAbout() {

            this.loading = true

            this.message = ''

            this.error = ''


            try {

                let response

                if (!this.about.id) {

                    response =
                        await axios.post(
                            '/api/about',
                            this.about
                        )

                }


                else {

                    response =
                        await axios.put(
                            '/api/about',
                            this.about
                        )

                }


                this.about =
                    response.data.data


                this.about.programming_languages =
                    this.about.programming_languages || []


                this.about.frameworks =
                    this.about.frameworks || []


                this.editing = false


                this.message =
                    response.data.message


            } catch (error) {

                console.log(error.response?.data)


                if (error.response?.status === 422) {

                    const errors =
                        error.response.data.errors


                    this.error =
                        Object.values(errors)
                            .flat()
                            .join(' ')

                }

                else {

                    this.error =
                        error.response?.data?.message ||
                        'Something went wrong.'

                }


            } finally {

                this.loading = false

            }

        },


        async deleteAbout() {

            if (
                !confirm(
                    'Are you sure you want to delete this About information?'
                )
            ) {

                return

            }


            this.loading = true

            this.message = ''

            this.error = ''


            try {

                const response =
                    await axios.delete(
                        '/api/about'
                    )


                this.about = {

                    title: '',

                    description: '',

                    programming_languages: [],

                    frameworks: []

                }


                this.editing = false


                this.message =
                    response.data.message


            } catch (error) {

                console.log(error.response?.data)


                this.error =
                    error.response?.data?.message ||
                    'Unable to delete About information.'


            } finally {

                this.loading = false

            }

        }

    }

}

</script>


<style scoped>

.about-page {

    padding: 30px;

    background: #f5f6fa;

    min-height: 100vh;

}



.page-header {

    display: flex;

    justify-content: space-between;

    align-items: center;

    margin-bottom: 25px;

}


.page-header h1 {

    margin: 0;

    font-size: 30px;

}


.page-header p {

    margin-top: 5px;

    color: #777;

}


/* ========================================= */
/* FORM HEADER */
/* ========================================= */

.form-header {

    display: flex;

    justify-content: space-between;

    align-items: center;

    margin-bottom: 15px;

}


.form-header h2 {

    margin: 0;

}


/* ========================================= */
/* CARD */
/* ========================================= */

.form-card {

    background: white;

    padding: 25px;

    margin-bottom: 20px;

    border-radius: 8px;

    box-shadow:
        0 2px 8px rgba(0, 0, 0, 0.08);

}


.form-card h2 {

    margin-top: 0;

    margin-bottom: 20px;

}


/* ========================================= */
/* TABLE */
/* ========================================= */

.table-header {

    display: flex;

    justify-content: space-between;

    align-items: center;

    margin-bottom: 20px;

}


.table-header h2 {

    margin: 0;

}


.table-wrapper {

    width: 100%;

    overflow-x: auto;

}


table {

    width: 100%;

    border-collapse: collapse;

}


th {

    background: #f5f6fa;

    padding: 14px;

    text-align: left;

    font-size: 14px;

    border-bottom: 1px solid #ddd;

}


td {

    padding: 14px;

    border-bottom: 1px solid #eee;

    vertical-align: top;

}


.description {

    max-width: 300px;

    line-height: 1.5;

}


.actions {

    white-space: nowrap;

}


/* ========================================= */
/* TAGS */
/* ========================================= */

.tag {

    display: inline-block;

    background: #e9ecef;

    padding: 5px 9px;

    margin: 2px;

    border-radius: 4px;

    font-size: 13px;

}


.framework-tag {

    background: #dfe7ff;

}


/* ========================================= */
/* FORM */
/* ========================================= */

.form-group {

    margin-bottom: 20px;

}


.form-group label {

    display: block;

    font-weight: 600;

    margin-bottom: 8px;

}


.form-group input,
.form-group textarea,
.skill-row input {

    width: 100%;

    padding: 12px;

    border: 1px solid #ddd;

    border-radius: 5px;

    box-sizing: border-box;

    font-size: 15px;

}


.form-group textarea {

    resize: vertical;

}


/* ========================================= */
/* SKILLS */
/* ========================================= */

.skill-row {

    display: flex;

    gap: 10px;

    margin-bottom: 12px;

}


.skill-row input {

    flex: 1;

}


/* ========================================= */
/* BUTTONS */
/* ========================================= */

.save-container {

    display: flex;

    justify-content: flex-end;

    margin-bottom: 30px;

}


.save-button {

    background: #222;

    color: white;

    border: none;

    padding: 12px 22px;

    border-radius: 6px;

    cursor: pointer;

    font-size: 14px;

}


.save-button:hover {

    background: #444;

}


.save-button:disabled {

    opacity: 0.6;

    cursor: not-allowed;

}


.edit-button {

    background: #0d6efd;

    color: white;

    border: none;

    padding: 8px 14px;

    border-radius: 5px;

    cursor: pointer;

}


.edit-button:hover {

    background: #0b5ed7;

}


.delete-button {

    background: #dc3545;

    color: white;

    border: none;

    padding: 8px 14px;

    border-radius: 5px;

    cursor: pointer;

    margin-left: 6px;

}


.delete-button:hover {

    background: #bb2d3b;

}


.delete-button:disabled {

    opacity: 0.6;

    cursor: not-allowed;

}


.cancel-button {

    background: #6c757d;

    color: white;

    border: none;

    padding: 9px 15px;

    border-radius: 5px;

    cursor: pointer;

}


.cancel-button:hover {

    background: #5c636a;

}


.add-button {

    background: #198754;

    color: white;

    border: none;

    padding: 10px 16px;

    border-radius: 5px;

    cursor: pointer;

}


.add-button:hover {

    background: #157347;

}


.remove-button {

    background: #dc3545;

    color: white;

    border: none;

    padding: 10px 15px;

    border-radius: 5px;

    cursor: pointer;

    white-space: nowrap;

}


.remove-button:hover {

    background: #bb2d3b;

}


/* ========================================= */
/* MESSAGES */
/* ========================================= */

.success-message {

    background: #d4edda;

    color: #155724;

    padding: 12px 15px;

    margin-bottom: 20px;

    border-radius: 5px;

}


.error-message {

    background: #f8d7da;

    color: #721c24;

    padding: 12px 15px;

    margin-bottom: 20px;

    border-radius: 5px;

}

</style>