import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue';
import ImprintView from '../views/ImprintView.vue';
import FaqView from '../views/FaqView.vue';
import SongbookView from '../views/SongbookView.vue';
import SongView from '../views/SongView.vue';
import InfoView from '../views/info/index.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  scrollBehavior(to, from, savedPosition) {
    if (to in ['song']) {
      return { top: 0 };
    }
    return savedPosition;
  },
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
    {
      path: '/songbook',
      name: 'songbook',
      component: SongbookView,
      meta: {
        theme: 'bright',
      },
    },
    {
      path: '/songbook/:song',
      name: 'song',
      component: SongView,
      meta: {
        theme: 'bright',
        hideFooter: true,
      },
    },
    {
      path: '/info',
      name: 'info',
      component: InfoView,
      meta: {
        theme: 'bright',
        hideFooter: true,
      },
    }
  ]
})

export default router
