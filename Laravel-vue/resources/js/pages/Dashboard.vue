<template>
    <div class="dashboard">

        <main class="main-content">

            <header class="topbar">
                <h1>Dashboard</h1>

                <span v-if="user">
                    Welcome, {{ user.name }}!
                </span>

                <span v-else>
                    Loading...
                </span>
            </header>

            <section class="content">

                <h2>Welcome to your Dashboard</h2>

                <!-- User Information -->
                <div v-if="user" class="user-info">
                    <h3>Logged-in User</h3>

                    <p>
                        <strong>Name:</strong>
                        {{ user.name }}
                    </p>

                    <p>
                        <strong>Email:</strong>
                        {{ user.email }}
                    </p>
                </div>

                <div class="cards">

                    <div class="card">
                        <h3>Users</h3>
                        <p>120</p>
                    </div>

                    <div class="card">
                        <h3>Articles</h3>
                        <p>25</p>
                    </div>

                    <div class="card">
                        <h3>Messages</h3>
                        <p>18</p>
                    </div>

                    <div class="card">
                        <h3>Visitors</h3>
                        <p>1,250</p>
                    </div>

                </div>

                <div class="recent">
                    <h2>Recent Activity</h2>

                    <table>
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Action</th>
                                <th>Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>John</td>
                                <td>Created an article</td>
                                <td>Today</td>
                            </tr>

                            <tr>
                                <td>Sarah</td>
                                <td>Updated profile</td>
                                <td>Yesterday</td>
                            </tr>

                            <tr>
                                <td>David</td>
                                <td>Sent a message</td>
                                <td>2 days ago</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </section>

        </main>

    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Dashboard',

    data() {
        return {
            user: null,
        };
    },

    async mounted() {
        await this.getUser();
    },

    methods: {

        async getUser() {

            const token = localStorage.getItem('token');

            // No token
            if (!token) {
                this.$router.replace('/login');
                return;
            }

            try {

                const response = await axios.get('/api/user', {
                    headers: {
                        Authorization: `Bearer ${token}`,
                        Accept: 'application/json'
                    }
                });

                console.log('User API response:', response.data);

                if (response.data.authenticated) {

                    this.user = response.data.user;

                } else {

                    localStorage.removeItem('token');
                    this.$router.replace('/login');

                }

            } catch (error) {

                console.error('Get user error:', error);

                if (error.response?.status === 401) {

                    localStorage.removeItem('token');
                    this.$router.replace('/login');

                } else {

                    console.error(
                        'Unable to get authenticated user.'
                    );

                }
            }
        }
    }
};
</script>

<style scoped>
.dashboard {
    display: flex;
    min-height: 100vh;
    background: #f5f6fa;
}

.main-content {
    flex: 1;
}

.topbar {
    background: white;
    padding: 20px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #ddd;
}

.topbar h1 {
    margin: 0;
}

.topbar span {
    color: #555;
}

.content {
    padding: 30px;
}

/* User Information */

.user-info {
    background: white;
    padding: 20px;
    margin-top: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
}

.user-info h3 {
    margin-top: 0;
    margin-bottom: 15px;
}

.user-info p {
    margin: 8px 0;
}

/* Cards */

.cards {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-top: 25px;
}

.card {
    background: white;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
}

.card h3 {
    margin-bottom: 10px;
}

.card p {
    font-size: 28px;
    font-weight: bold;
}

/* Recent Activity */

.recent {
    background: white;
    margin-top: 30px;
    padding: 25px;
    border-radius: 8px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th,
td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background: #f5f5f5;
}

/* Responsive */

@media (max-width: 900px) {
    .cards {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 600px) {
    .cards {
        grid-template-columns: 1fr;
    }
}
</style>
