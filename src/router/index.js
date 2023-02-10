import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import Booking from '../views/BookingView.vue'
import Inscription from '../views/Inscription.vue'
import Login from '../views/Login.vue'
const routes = [
  {
    path: '/',
    name: 'home',
    component:Home
  },
  {
    path: '/booking',
    name: 'booking',
    component:Booking
  },
  {
    path: '/Inscription',
    name:'Inscription',
    component:Inscription
  },
  {
    path: '/login',
    name:'Login',
    component:Login
  }
]
const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
