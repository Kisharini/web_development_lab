import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: () => import('@/components/Dashboard.vue')
  },
  {
    path: '/quiz',
    name: 'Quiz',
    component: () => import('@/components/Quiz.vue'),
    props: route => ({ id: route.query.id }) 
  },
  {
    path: '/result',
    name: 'Result',
    component: () => import('@/components/Result.vue')
  }
]

const router = createRouter({
  history: createWebHistory('/'),
  routes
})

export default router
