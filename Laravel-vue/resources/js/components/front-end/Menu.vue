<template>
    <nav>
        <router-link to="/">Home</router-link>
        <router-link to="/about">About</router-link>
        <router-link to="/contact">Contact</router-link>

        <router-link class="login" to="/login">login</router-link>
    </nav>
</template>

<script>
export default {
    name: 'Menu'
}
</script>

<style scoped>
nav {
    display: flex;
    gap: 20px;
}

nav a {
    color: white;
    text-decoration: none;
}
.login {
    margin-left: 30%;
}
</style>