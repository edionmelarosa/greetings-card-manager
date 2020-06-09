import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

const routes = [
    {
        path     : '/',
        name     : 'HomePage',
        component: () => import('@app/pages/ProfilePage.vue')
    },
    {
        path     : '/profile',
        name     : 'ProfilePage',
        component: () => import('@app/pages/ProfilePage.vue')
    },
    {
        path     : '/users',
        name     : 'UsersPage',
        component: () => import('@app/pages/UsersPage.vue')
    },
    {
        path     : '/cards/create',
        name     : 'CardsCreatePage',
        component: () => import('@app/pages/CardsCreatePage.vue')
    },
    {
        path     : '/cards/sent',
        name     : 'SentCardsCreatePage',
        component: () => import('@app/pages/SentCardsCreatePage.vue')
    },
    {
        path     : '/cards/received',
        name     : 'ReceivedCardsCreatePage',
        component: () => import('@app/pages/ReceivedCardsCreatePage.vue')
    },
];

const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;