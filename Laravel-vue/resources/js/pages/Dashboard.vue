```vue
<template>
    <div class="dashboard">

        <!-- Main Content -->
        <main class="main-content">

            <header class="topbar">
                <h1>Dashboard</h1>
                <span>Welcome!</span>
            </header>

            <section class="content">

                <h2>Welcome to your Dashboard</h2>

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

    async mounted() {
        try {
            const response = await axios.get('/api/user');

            if (!response.data.authenticated) {
                this.$router.push('/');
            }

        } catch (error) {
            if (error.response?.status === 401) {
                this.$router.push('/');
            }
        }
    }
}
</script>

<style scoped>
.dashboard {
    display: flex;
    min-height: 100vh;
    background: #f5f6fa;
}


.logout {
    margin-top: auto;
    padding: 10px;
    border: none;
    background: #dc3545;
    color: white;
    border-radius: 5px;
    cursor: pointer;
}

.logout:hover {
    background: #c82333;
}

/* Main Content */

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

.content {
    padding: 30px;
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
    .sidebar {
        width: 180px;
    }

    .cards {
        grid-template-columns: 1fr;
    }
}
</style>
