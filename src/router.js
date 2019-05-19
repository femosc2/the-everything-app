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
      path: '/movies/search',
      name: 'moviesSearch',
      component: () => import('./views/MoviesSearch.vue')
    },
    {
      path: '/movies/library',
      name: 'moviesLibrary',
      component: () => import('./views/MoviesLibrary.vue')
    },
    {
      path: '/media/library',
      name: 'mediaLibrary',
      component: () => import('./views/MediaLibrary.vue')
    },
    {
      path: '/media/upload',
      name: 'mediaUpload',
      component: () => import('./views/MediaUpload.vue')
    }
  ]
})
