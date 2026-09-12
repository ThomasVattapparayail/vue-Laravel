import { createRouter, createWebHistory } from 'vue-router';

import Home from '../pages/Home.vue';
import About from '../pages/About.vue';
import Contact from '../pages/contact.vue';
import Login from '../pages/Login.vue';

import Dashboard from '../pages/Dashboard.vue';
import About1 from '../pages/back-end/About.vue';
import Contact1 from '../pages/back-end/Contact.vue';

const routes = [

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

    {
        path: '/login',
        name: 'Login',
        component: Login
    },

    // Dashboard Home
    {
        path: '/dashboard',
        name: 'Dashboard',
        component: Dashboard,
        meta: {
            requiresAuth: true
        }
    },

    // Dashboard About
    {
        path: '/dashboard/about',
        name: 'DashboardAbout',
        component: About1,
        meta: {
            requiresAuth: true
        }
    },

    // Dashboard Contact
    {
        path: '/dashboard/contact',
        name: 'DashboardContact',
        component: Contact1,
        meta: {
            requiresAuth: true
        }
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

router.beforeEach((to) => {

    const token = localStorage.getItem('token');

    // Dashboard pages require login
    if (to.meta.requiresAuth && !token) {
        return {
            name: 'Login'
        };
    }

    // Already logged in → don't allow login page
    if (to.name === 'Login' && token) {
        return {
            name: 'Dashboard'
        };
    }

    return true;
});

export default router;

