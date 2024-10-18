import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '@/views/HomeView.vue'
import PeopleView from '@/views/PeopleView.vue'
import FormView from '@/views/FormView.vue'
import EditView from '@/views/EditView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/people',
    name: 'peopleView',
    component: PeopleView
    // component: () => import('../views/PeopleView.vue')
  },
  {
    path: '/people/new',
    name: 'addPerson',
    component: FormView
  },
  {
    path: '/people/edit/:id',
    name: 'editPerson',
    component: EditView
  }
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
})

export default router
