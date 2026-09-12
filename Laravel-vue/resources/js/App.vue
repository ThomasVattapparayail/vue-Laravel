<template>
    <div class="app">

        <!-- Backend Header -->
        <BackendHeader v-if="isDashboard" />

        <!-- Frontend Header -->
        <Header v-else />

        <!-- Dashboard Layout -->
        <div v-if="isDashboard" class="dashboard-layout">

            <!-- Backend Sidebar -->
            <Sidebar />

            <!-- Dashboard Content -->
            <main class="content">
                <router-view />
            </main>

        </div>

        <!-- Normal Frontend Content -->
        <main v-else class="content">
            <router-view />
        </main>

        <!-- Backend Footer -->
        <BackendFooter v-if="isDashboard" />

        <!-- Frontend Footer -->
        <Footer v-else />

    </div>
</template>

<script>
import Header from './components/front-end/Header.vue'
import Footer from './components/front-end/Footer.vue'

import BackendHeader from './components/back-end/Header.vue'
import BackendFooter from './components/back-end/Footer.vue'

import Sidebar from './components/back-end/Menu.vue'

export default {
    name: 'App',

    components: {
        Header,
        Footer,
        BackendHeader,
        BackendFooter,
        Sidebar
    },

    computed: {
        isDashboard() {
            return this.$route.path.startsWith('/dashboard')
        }
    }
}
</script>

<style>
html,
body,
#app {
    margin: 0;
    min-height: 100%;
}

.app {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.dashboard-layout {
    display: flex;
    flex: 1;
}

.content {
    flex: 1;
    padding: 20px;
}
</style>

