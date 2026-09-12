<template>
    <header class="header">

        <div class="side-heading">
            <h1>M's</h1>
        </div>

        <button class="logout" @click="logout" :disabled="loading">
            {{ loading ? 'Logging out...' : 'Logout' }}
        </button>

    </header>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Header',

    data() {
        return {
            loading: false
        };
    },

    methods: {
        async logout() {
            this.loading = true;

            const token = localStorage.getItem('token');

            try {
                if (token) {
                    await axios.post(
                        '/api/logout',
                        {},
                        {
                            headers: {
                                Authorization: `Bearer ${token}`,
                                Accept: 'application/json'
                            }
                        }
                    );
                }

                // Remove authentication token
                localStorage.removeItem('token');

                // Redirect to login
                this.$router.push('/login');

            } catch (error) {
                console.error('Logout error:', error);

                // Even if API fails, remove local token
                localStorage.removeItem('token');

                // Redirect to login
                this.$router.push('/login');

            } finally {
                this.loading = false;
            }
        }
    }
};
</script>

<style scoped>
.header {
    background: #222;
    color: white;
    padding: 15px 30px;

    display: flex;
    align-items: center;
    justify-content: space-between;
}

.side-heading h1 {
    margin: 0;
    font-size: 24px;
}

.logout {
    background: #dc3545;
    color: white;
    border: none;
    padding: 10px 18px;
    border-radius: 5px;
    cursor: pointer;
}

.logout:hover {
    background: #bb2d3b;
}

.logout:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}
</style>