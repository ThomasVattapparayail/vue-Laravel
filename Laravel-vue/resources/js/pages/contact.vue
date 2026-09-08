<template>
    <section class="contact">
        <div class="container">
            <h1>Contact Us</h1>

            <p>
                We'd love to hear from you. Feel free to get in touch with us.
            </p>

            <div class="contact-content">

                <!-- Contact Information -->
                <div class="contact-info">
                    <h2>Get in Touch</h2>

                    <p>
                        If you have any questions, suggestions, or feedback,
                        please contact us using the information below.
                    </p>

                    <p>
                        <strong>Email:</strong>
                        example@gmail.com
                    </p>

                    <p>
                        <strong>Phone:</strong>
                        +91 98765 43210
                    </p>

                    <p>
                        <strong>Address:</strong>
                        Kerala, India
                    </p>
                </div>

                <!-- Contact Form -->
                <div class="contact-form">
                    <h2>Send Us a Message</h2>

                    <form @submit.prevent="submitForm">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input
                                type="text"
                                id="name"
                                v-model="form.name"
                                placeholder="Enter your name"
                            >
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input
                                type="email"
                                id="email"
                                v-model="form.email"
                                placeholder="Enter your email"
                            >
                        </div>

                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea
                                id="message"
                                v-model="form.message"
                                rows="5"
                                placeholder="Enter your message"
                            ></textarea>
                        </div>

                        <button type="submit">
                            Send Message
                        </button>

                    </form>
                </div>

            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Contact',

    data() {
        return {
            form: {
                name: '',
                email: '',
                message: ''
            }
        }
    },

    methods: {
        submitForm() {
            alert('Message sent successfully!')

            this.form.name = ''
            this.form.email = ''
            this.form.message = ''
        }
    }
}
</script>

<style scoped>
.contact {
    padding: 50px 0;
}

.container {
    width: 80%;
    max-width: 1100px;
    margin: auto;
}

.contact h1 {
    text-align: center;
    font-size: 36px;
    margin-bottom: 20px;
}

.contact > .container > p {
    text-align: center;
    line-height: 1.7;
}

.contact-content {
    display: flex;
    gap: 40px;
    margin-top: 40px;
}

.contact-info,
.contact-form {
    flex: 1;
    padding: 25px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

.contact-info h2,
.contact-form h2 {
    margin-bottom: 20px;
}

.contact-info p {
    line-height: 1.7;
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
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-family: inherit;
}

.form-group textarea {
    resize: vertical;
}

button {
    padding: 12px 20px;
    background: #222;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background: #444;
}

@media (max-width: 768px) {
    .contact-content {
        flex-direction: column;
    }
}
</style>