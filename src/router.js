import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'weather',
      component: () => import('./views/Weather.vue')
    },
    {
      path: '/movies',
      name: 'movies',
      component: () => import('./views/Movies.vue')
    },
    {
      path: '/movies/movieSearch',
      name: 'movies',
      component: () => import('./views/MoviesSearch.vue')
    },
    {
      path: '/movies/library',
      name: 'movies',
      component: () => import('./views/MoviesLibrary.vue')
    }
  ]
})
