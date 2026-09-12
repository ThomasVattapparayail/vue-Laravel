import { createRouter, createWebHistory } from 'vue-router';

import Home from '../pages/Home.vue';
import About from '../pages/About.vue';
import Contact from '../pages/contact.vue';
import Login from '../pages/Login.vue';

import Dashboard from '../pages/Dashboard.vue';
import DashboardAbout from '../pages/back-end/About.vue';
import DashboardContact from '../pages/back-end/Contact.vue';

const routes = [

    // =========================
    // FRONTEND
    // =========================

    {
        path: '/',
        name: 'Home',
        component: Home
    },

    {
        path: '/about',
        name: 'About',
        component: About
    },

    {
        path: '/contact',
        name: 'Contact',
        component: Contact
    },

    // =========================
    // LOGIN
    // =========================

    {
        path: '/login',
        name: 'Login',
        component: Login
    },

    // =========================
    // BACKEND / DASHBOARD
    // =========================

    {
        path: '/dashboard',
        name: 'Dashboard',
        component: Dashboard,

        meta: {
            requiresAuth: true
        },

        children: [

            {
                path: 'about',
                name: 'DashboardAbout',
                component: DashboardAbout
            },

            {
                path: 'contact',
                name: 'DashboardContact',
                component: DashboardContact
            }

        ]
    }

];


// =========================
// CREATE ROUTER
// =========================

const router = createRouter({

    history: createWebHistory(),

    routes

});


// =========================
// AUTH GUARD
// =========================

router.beforeEach((to) => {

    const token = localStorage.getItem('token');

    // User is trying to access dashboard
    // without being logged in
    if (to.meta.requiresAuth && !token) {

        return {
            name: 'Login'
        };

    }


    // User is already logged in
    // and tries to open login page
    if (to.name === 'Login' && token) {

        return {
            name: 'Dashboard'
        };

    }


    // Allow navigation
    return true;

});


export default router;

