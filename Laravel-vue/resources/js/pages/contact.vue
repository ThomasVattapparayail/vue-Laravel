<template>
    <section class="contact">
        <div class="container">

            <h1>Contact Me</h1>

            <p class="intro">
                I love to hear from you. Feel free to get in touch with Me.
            </p>

            <div class="contact-content">

                <!-- Contact Form -->
                <div class="contact-form">

                    <!-- Success Message -->
                    <div
                        v-if="successMessage"
                        class="message success-message"
                    >
                        {{ successMessage }}
                    </div>

                    <!-- General Error Message -->
                    <div
                        v-if="errorMessage"
                        class="message error-message"
                    >
                        {{ errorMessage }}
                    </div>

                    <h2>Send Us a Message</h2>

                    <form @submit.prevent="submitForm">

                        <!-- Name -->
                        <div class="form-group">
                            <label for="name">Name</label>

                            <input
                                type="text"
                                id="name"
                                v-model="form.name"
                                placeholder="Enter your name"
                                :class="{ 'input-error': errors.name }"
                            >

                            <small
                                v-if="errors.name"
                                class="field-error"
                            >
                                {{ errors.name[0] }}
                            </small>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>

                            <input
                                type="email"
                                id="email"
                                v-model="form.email"
                                placeholder="Enter your email"
                                :class="{ 'input-error': errors.email }"
                            >

                            <small
                                v-if="errors.email"
                                class="field-error"
                            >
                                {{ errors.email[0] }}
                            </small>
                        </div>

                        <!-- Message -->
                        <div class="form-group">
                            <label for="message">Message</label>

                            <textarea
                                id="message"
                                v-model="form.message"
                                rows="6"
                                placeholder="Enter your message"
                                :class="{ 'input-error': errors.message }"
                            ></textarea>

                            <small
                                v-if="errors.message"
                                class="field-error"
                            >
                                {{ errors.message[0] }}
                            </small>
                        </div>

                        <button
                            type="submit"
                            :disabled="loading"
                        >
                            {{ loading ? 'Sending...' : 'Send Message' }}
                        </button>

                    </form>
                </div>

            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios'

export default {
    name: 'Contact',

    data() {
        return {
            form: {
                name: '',
                email: '',
                message: ''
            },

            loading: false,
            successMessage: '',
            errorMessage: '',
            errors: {}
        }
    },

    methods: {

        async submitForm() {

            this.loading = true
            this.successMessage = ''
            this.errorMessage = ''
            this.errors = {}

            try {

                const response = await axios.post(
                    '/api/contact',
                    this.form
                )

                this.successMessage = response.data.message

                this.form = {
                    name: '',
                    email: '',
                    message: ''
                }

            } catch (error) {

                if (error.response?.status === 422) {

                    this.errors = error.response.data.errors

                } else {

                    this.errorMessage =
                        error.response?.data?.message ||
                        'Something went wrong. Please try again.'
                }

            } finally {

                this.loading = false
            }
        }
    }
}
</script>

<style scoped>

.contact {
    padding: 60px 20px;
}

.container {
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
}

.contact h1 {
    text-align: center;
    font-size: 36px;
    margin-bottom: 15px;
}

.intro {
    text-align: center;
    line-height: 1.7;
    margin-bottom: 40px;
}

.contact-content {
    display: flex;
    justify-content: center;
}

.contact-form {
    width: 100%;
    padding: 30px;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    box-sizing: border-box;
}

.contact-form h2 {
    margin-bottom: 25px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

.form-group input,
.form-group textarea {
    display: block;
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
    box-sizing: border-box;
    font-family: inherit;
    font-size: 15px;
}

.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #222;
}

.form-group textarea {
    resize: vertical;
    min-height: 140px;
}

button {
    width: 100%;
    padding: 13px 20px;
    background: #222;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background: #444;
}

button:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

/* Success/Error */

.message {
    padding: 12px;
    margin-bottom: 20px;
    border-radius: 5px;
}

.success-message {
    color: green;
    background: #eaf8ea;
}

.error-message {
    color: #800026;
    background: #fdecef;
}

/* Validation errors */

.field-error {
    display: block;
    margin-top: 5px;
    color: #dc3545;
}

.input-error {
    border-color: #dc3545 !important;
}

/* Mobile */

@media (max-width: 768px) {

    .contact {
        padding: 40px 15px;
    }

    .contact h1 {
        font-size: 30px;
    }

    .contact-form {
        padding: 20px;
    }

}

</style>