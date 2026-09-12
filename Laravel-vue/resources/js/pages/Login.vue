<template>
    <div class="login-page">
        <div class="login-box">
            <h1>Login</h1>

            <form @submit.prevent="login">

                <div class="form-group">
                    <label>Email</label>

                    <input
                        type="email"
                        v-model="email"
                        placeholder="Enter your email"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Password</label>

                    <input
                        type="password"
                        v-model="password"
                        placeholder="Enter your password"
                        required
                    >
                </div>

                <button type="submit" :disabled="loading">
                    {{ loading ? 'Logging in...' : 'Login' }}
                </button>

            </form>

            <p v-if="message" class="message">
                {{ message }}
            </p>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Login',

    data() {
        return {
            email: '',
            password: '',
            message: '',
            loading: false
        };
    },

    methods: {
        async login() {

            this.loading = true;
            this.message = '';

            try {

                const response = await axios.post('/api/login', {
                    email: this.email,
                    password: this.password
                });

                console.log('Login response:', response.data);

                if (response.data.success && response.data.token) {

                    // Save token
                    localStorage.setItem(
                        'token',
                        response.data.token
                    );

                    // Save user
                    localStorage.setItem(
                        'user',
                        JSON.stringify(response.data.user)
                    );

                    // Go to dashboard
                    window.location.href = '/dashboard';

                } else {

                    this.message = 'Login successful, but token was not received.';
                }

            } catch (error) {

                console.error('Login error:', error);

                this.message =
                    error.response?.data?.message ||
                    'Invalid email or password.';

            } finally {

                this.loading = false;

            }
        }
    }
};
</script>

<style scoped>
.login-page {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #f5f5f5;
}

.login-box {
    width: 100%;
    max-width: 400px;
    padding: 30px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}

.login-box h1 {
    text-align: center;
    margin-bottom: 25px;
}

.form-group {
    margin-bottom: 18px;
}

.form-group label {
    display: block;
    margin-bottom: 7px;
    font-weight: 600;
}

.form-group input {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
}

button {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 5px;
    background: #222;
    color: white;
    font-size: 16px;
    cursor: pointer;
}

button:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

.message {
    margin-top: 15px;
    text-align: center;
    color: red;
}
</style>

