import Vue from 'vue';
import Router from 'vue-router'
import Login from '../components/users/Login.vue';
import Signup from '../components/users/Signup.vue';
import Home from '../components/Home.vue';
import Profile from '../components/users/Profile.vue'
import FollowUsers from '../components/FollowUsers.vue'


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
            path: '/home', component: Home
        },
        {
            path: '/profile', component: Profile
        },
        {
            path: '/suggestions', component: FollowUsers
        }
    ]
});