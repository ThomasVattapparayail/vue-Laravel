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

                <button type="submit">Login</button>
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
            message: ''
        }
    },

    methods: {
        async login() {
             try {
                 const response = await axios.post('/api/login',
                  {
                     email: this.email, password: this.password 
                    }
                );
                  if (response.data.success) 
                  { 
                    this.$router.push('/dashboard');

                   }
                 } catch (error)
                  { 
                    this.message = error.response?.data?.message || 'Login failed';
                  } 
                }
    }
}
</script>

<style scoped>
.login-page {
    min-height: 80vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.login-box {
    width: 400px;
    padding: 30px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
}

h1 {
    text-align: center;
    margin-bottom: 25px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 7px;
    font-weight: bold;
}

input {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

button {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 5px;
    background: #333;
    color: white;
    cursor: pointer;
}

button:hover {
    background: #555;
}

.message {
    text-align: center;
    margin-top: 15px;
}
</style>
