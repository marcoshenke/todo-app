import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("./Pages/Register.vue"),
    },
    {
        path: "/login",
        component: () => import("./Pages/Login.vue"),
    },
    {
        path: "/task-board",
        component: () => import("./Pages/TaskBoard.vue"),
        meta: { requiresAuth: true }
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    const isAuthenticated = !!localStorage.getItem('auth_token');

    if (to.meta.requiresAuth && !isAuthenticated) {
      next('/login');
    } else {
      next();
    }
  });


  export default router;
