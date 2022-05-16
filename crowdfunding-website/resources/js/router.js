import {
    createRouter,
    createWebHistory
} from 'vue-router'

const routes = [{
        path: '/',
        name: 'home',
        alias: '/home',
        component: () => import('./views/Home.vue')
    },
    {
        path: '/donations',
        name: 'donations',
        component: () => import('./views/Donations.vue')
    },
    {
        path: '/campaigns',
        name: 'campaigns',
        component: () => import('./views/Campaigns.vue')
    },
    {
        path: '/campaign/:id',
        name: 'campaign',
        component: () => import('./views/Campaign.vue')
    },
    {
        path: '/blogs',
        name: 'blogs',
        component: () => import('./views/Blogs.vue')
    },
    {
        path: '/:catchAll(.*)',
        redirect: '/'
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
