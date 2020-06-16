import Vue from 'vue';
import Router from 'vue-router'
import Login from '../components/setup/Login.vue';
import Signup from '../components/setup/Signup.vue';
import MainLayout from '../components/MainLayout.vue';


Vue.use(Router)

export default new Router({
    mode:'history',
    routes:[
        {
            path: '/login', component: Login
        },
        {
            path: '/signup', component: Signup
        },
        {
            path: '/home', component: MainLayout
        }
    ]
});