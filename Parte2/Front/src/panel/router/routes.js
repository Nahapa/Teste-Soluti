import { createWebHistory, createRouter } from "vue-router";
import Login from "@/panel/pages/auth/LoginPage.vue";
import Register from "@/panel/pages/auth/RegisterPage.vue";
import Home from "@/panel/pages/admin/HomePage.vue";
import Certificate from "@/panel/pages/admin/CertificatePage.vue";
import User from "@/panel/pages/admin/UserPage.vue";
import NotFound from "@/panel/pages/NotFoundPage.vue";

const routes = [
    {
        path: '/',
        component: () => import('@/panel/layouts/admin/Template'),
        children: [

            {
                path: '/users',
                name: 'user',
                component: User,
            },
            {
                path: '/certificates',
                name: 'certificate',
                component: Certificate,
            },
            {
                path: '/',
                name: 'home',
                component: Home,
            }
        ]
    },
    {
        path: '/',
        component: () => import('@/panel/layouts/auth/Template'),
        children: [
            {
                path: '/login',
                name: 'login',
                component: Login,
            },
            {
                path: '/register',
                name: 'register',
                component: Register,
            },
        ]
    },
    {
        path: '/:pathMatch(.*)*',
        name: 'notfound',
        component: NotFound
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;