import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("./Pages/Home.vue"),
    },
    {
        path: "/login",
        component: () => import("./Pages/Login.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
