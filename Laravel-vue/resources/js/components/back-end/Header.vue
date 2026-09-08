<template>
    <header class="header">

        <div class="side-heading">
            <h1>M's</h1>
        </div>

        <button class="logout" @click="logout">
            Logout
        </button>

    </header>
</template>

<script>
export default {
    name: 'Header',

    methods: {
        logout() {
            this.$router.push('/login')
        }
    }
}
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
</style>
```
