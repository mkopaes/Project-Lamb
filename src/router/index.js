import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/people',
      name: 'PeopleView',
      
      component: () => import('../views/PeopleView.vue')
    },
    {
      path: '/people/new',
      name: 'AddPerson',

      component: () => import('../views/FormView.vue')
    },
    {
      path: '/people/edit/:id',
      name: 'EditPerson',

      component: () => import('../views/FormView.vue'),

      props: (route) => ({ id: route.params.id, isEditing: true})
    }
  ]
})

export default router
