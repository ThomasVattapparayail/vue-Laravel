import { createRouter,createWebHistory } from 'vue-router';
import Home from '../pages/Home.vue'
import About from '../pages/About.vue';
import Contact from '../pages/contact.vue';
import Login from '../pages/Login.vue';
import Dashboard from '../pages/Dashboard.vue';
import DashboardAbout from '../pages/back-end/About.vue';
const routes=[

      {
        path:'/',
        component:Home
      },
      {
        path:'/about',
        component:About
      },
      {
        path:'/contact',
        component:Contact
      },
      {
        path:'/login',
        component:Login
      },


      {
        path:'/dashboard',
        component:Dashboard
      },
      {
        path:'/dashboard/about',
        component:DashboardAbout
      }
];

const router=createRouter({
   history: createWebHistory(),
   routes
});

export default router