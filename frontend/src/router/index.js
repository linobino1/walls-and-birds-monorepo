import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue';
import ImprintView from '../views/ImprintView.vue';
import FaqView from '../views/FaqView.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/imprint',
      name: 'imprint',
      component: ImprintView,
    },
    {
      path: '/faq',
      name: 'faq',
      component: FaqView,
    },
  ]
})

export default router
