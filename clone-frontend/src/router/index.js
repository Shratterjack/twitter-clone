import Vue from 'vue';
import Router from 'vue-router'
import Login from '../components/users/Login.vue';
import Signup from '../components/users/Signup.vue';
import Home from '../components/Home.vue';
import Profile from '../components/users/Profile.vue'
import FollowUsers from '../components/FollowUsers.vue'


Vue.use(Router)

let userdetail = localStorage.getItem("userdetail");
let id = null
if(userdetail !== null){
    userdetail = JSON.parse(localStorage.getItem("userdetail"));
    id = userdetail[0].id;
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
            path: '/home', component: Home, props: { id: id }
        },
        {
            path: '/profile', component: Profile, props: { id: id}
        },
        {
            path: '/suggestions', component: FollowUsers, props: { id: id}
        }
    ]
});