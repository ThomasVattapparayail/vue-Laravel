<template>
    <header class="header">
                <div class="container header-content">

                    <h1>Midhun</h1>

                    <Menu/>
                    

                </div>
    </header>
</template>
<script>
import Menu from './Menu.vue'

export default {
    name: 'Header',

    components: {
        Menu
    }
}
</script>
<style scoped>
.header {
    background: #222;
    color: white;
    padding: 20px 0;
}

.container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header h1 {
    margin: 0;
}
</style>