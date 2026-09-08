<template>
    <section class="contacts">
        <div class="container">

            <div class="header">
                <h1>Contact Messages</h1>

                <button @click="getContacts" class="refresh-btn">
                    Refresh
                </button>
            </div>

            <!-- Loading -->
            <p v-if="loading" class="loading">
                Loading contacts...
            </p>

            <!-- Error -->
            <div v-if="errorMessage" class="error">
                {{ errorMessage }}
            </div>

            <!-- Contact Table -->
            <div v-if="!loading && contacts.length > 0" class="table-wrapper">

                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr
                            v-for="(contact, index) in contacts"
                            :key="contact.id"
                        >
                            <td>{{ index + 1 }}</td>

                            <td>{{ contact.name }}</td>

                            <td>{{ contact.email }}</td>

                            <td class="message">
                                {{ contact.message }}
                            </td>

                            <td>
                                {{ formatDate(contact.created_at) }}
                            </td>

                            <td>
                                <button
                                    class="delete-btn"
                                    @click="deleteContact(contact.id)"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>

            <!-- No contacts -->
            <p
                v-if="!loading && contacts.length === 0"
                class="no-data"
            >
                No contact messages found.
            </p>

        </div>
    </section>
</template>

<script>
import axios from 'axios'

export default {
    name: 'Contact',

    data() {
        return {
            contacts: [],
            loading: false,
            errorMessage: ''
        }
    },

    mounted() {
        this.getContacts()
    },

    methods: {

        async getContacts() {

            this.loading = true
            this.errorMessage = ''

            try {

                const response = await axios.get('/api/contacts')

                this.contacts = response.data

            } catch (error) {

                console.error(error)

                this.errorMessage =
                    'Unable to load contact messages.'

            } finally {

                this.loading = false

            }
        },

        async deleteContact(id) {

            if (!confirm('Are you sure you want to delete this message?')) {
                return
            }

            try {

                await axios.delete(`/api/contacts/${id}`)

                // Remove deleted contact from the list
                this.contacts = this.contacts.filter(
                    contact => contact.id !== id
                )

            } catch (error) {

                console.error(error)

                alert('Unable to delete contact.')

            }
        },

        formatDate(date) {

            return new Date(date).toLocaleDateString('en-IN', {
                day: '2-digit',
                month: 'short',
                year: 'numeric'
            })

        }
    }
}
</script>

<style scoped>

.contacts {
    padding: 40px 0;
}

.container {
    width: 90%;
    max-width: 1200px;
    margin: auto;
}

/* Header */

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

.header h1 {
    margin: 0;
}

.refresh-btn {
    padding: 10px 18px;
    border: none;
    border-radius: 5px;
    background: #222;
    color: white;
    cursor: pointer;
}

.refresh-btn:hover {
    background: #444;
}

/* Table */

.table-wrapper {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: white;
}

th,
td {
    padding: 14px;
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background: #f5f5f5;
    font-weight: bold;
}

.message {
    max-width: 300px;
    word-break: break-word;
}

/* Delete */

.delete-btn {
    padding: 8px 12px;
    background: #dc3545;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.delete-btn:hover {
    background: #b02a37;
}

/* Messages */

.loading {
    text-align: center;
    padding: 30px;
}

.no-data {
    text-align: center;
    padding: 30px;
    color: #777;
}

.error {
    padding: 12px;
    margin-bottom: 20px;
    background: #f8d7da;
    color: #721c24;
    border-radius: 5px;
}

/* Mobile */

@media (max-width: 768px) {

    .header {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }

    th,
    td {
        padding: 10px;
        font-size: 14px;
    }
}

</style>