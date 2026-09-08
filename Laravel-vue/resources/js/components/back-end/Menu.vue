<template>
   <aside class="sidebar">

            <nav>
                <router-link to="/dashboard">Dashboard</router-link>
                <router-link to="/dashboard/about">About</router-link>
                <router-link to="/dashboard/contact">Contact</router-link>
                
            </nav>

            
    </aside> 
</template>
<script>

</script>
<style scoped>
.sidebar {
    width: 230px;
    background: #222;
    color: white;
    padding: 25px 20px;
    display: flex;
    flex-direction: column;
}

.sidebar h2 {
    margin-bottom: 30px;
}

.sidebar nav {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.sidebar a {
    color: white;
    text-decoration: none;
    padding: 10px;
    border-radius: 5px;
}

.sidebar a:hover {
    background: #444;
}

</style>
