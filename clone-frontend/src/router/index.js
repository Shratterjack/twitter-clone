import Vue from 'vue';
import Router from 'vue-router'
import Login from '../components/users/Login.vue';
import Signup from '../components/users/Signup.vue';
import Home from '../components/Home.vue';
import Profile from '../components/users/Profile.vue'
import FollowUsers from '../components/FollowUsers.vue'


Vue.use(Router)

let userdetail = localStorage.getItem("userdetail");
if(userdetail !== null){
    userdetail = JSON.parse(localStorage.getItem("userdetail"))
}

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
            path: '/home', component: Home, props: { id: userdetail[0].id }
        },
        {
            path: '/profile', component: Profile, props: { id: userdetail[0].id }
        },
        {
            path: '/suggestions', component: FollowUsers, props: { id: userdetail[0].id }
        }
    ]
});