<template>
    <div class="app">

        <!-- Frontend Header -->
        <Header v-if="!isDashboard" />

        <!-- Backend Header -->
        <BackendHeader v-else />

        <div class="dashboard-layout" v-if="isDashboard">

            <!-- Sidebar -->
            <Sidebar />

            <!-- Dashboard Content -->
            <main class="content">
                <router-view />
            </main>

        </div>

        <!-- Normal Frontend Content -->
        <main class="content" v-else>
            <router-view />
        </main>

        <!-- Frontend Footer -->
        <Footer v-if="!isDashboard" />

        <!-- Backend Footer -->
        <BackendFooter v-else />

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

