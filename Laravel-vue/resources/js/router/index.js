import { createRouter, createWebHistory } from 'vue-router';

import Home from '../pages/Home.vue';
import About from '../pages/About.vue';
import Contact from '../pages/contact.vue';
import Login from '../pages/Login.vue';

import Dashboard from '../pages/Dashboard.vue';
import DashboardAbout from '../pages/back-end/About.vue';
import DashboardContact from '../pages/back-end/Contact.vue';

const routes = [
    {
        path: '/',
        component: Home
    },

    {
        path: '/about',
        component: About
    },

    {
        path: '/contact',
        component: Contact
    },

    {
        path: '/login',
        component: Login
    },

    {
        path: '/dashboard',
        component: Dashboard,
        meta: {
            requiresAuth: true
        },
        children: [
            {
                path: 'about',
                component: DashboardAbout
            },

            {
                path: 'contact',
                component: DashboardContact
            }
        ]
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

/*
|--------------------------------------------------------------------------
| Authentication Guard
|--------------------------------------------------------------------------
*/

router.beforeEach((to) => {

    const token = localStorage.getItem('token');

    // User is trying to access dashboard without login
    if (to.meta.requiresAuth && !token) {
        return '/login';
    }

    // User is already logged in and tries to open login page
    if (to.path === '/login' && token) {
        return '/dashboard';
    }

    return true;
});

export default router;

