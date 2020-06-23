<template>
    <div id="app-signup" class="onboardClass">
    <form class="onboardForm" @submit="signupUser">
    <div class="mb-3">
        <span class="h3 login-header">Sign up for Twitter-Clone</span>
    </div>
      <label for="name" class="sr-only">Name</label>
      <input type="text" v-model="name" id="name" class="form-control" placeholder="Name" required autofocus>
        <label for="email" class="sr-only">Email address</label>
      <input type="email" v-model="email" id="email" class="form-control mt-2" placeholder="Email address" required autofocus>
      <label for="password" class="sr-only">Password</label>
      <input type="password" v-model="password" id="password" class="form-control mt-2" placeholder="Password" required>
        <label for="password" class="sr-only">Confirm Password</label>
      <input type="password" v-model="confirmPassword" id="confirmPassword" class="form-control mt-2" placeholder="Confirm Password" required>
      <button class="btn btn-lg btn-primary btn-block mt-2" type="submit">Sign up</button>
        <router-link to="/login">Already have an account? Log in</router-link>

    </form>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data(){
        return {
            name:'',
            email:'',
            password:'',
            confirmPassword:''
        }
    },
    methods:{
        signupUser(event){
            event.preventDefault();
            var that = this;
            axios({
                method: 'post',
                url: 'http://localhost/users/add.json',
                data: {
                    username:this.name,
                    email: this.email,
                    password: this.password,
                    confirmPassword: this.confirmPassword,
                },
                headers: {
                    'Content-Type': 'application/json',
                }
            }).then(function (response) {
                let result = response.data;
                alert(result.info);
                if(result.status){
                    that.$router.push('/login');
                }
            }).catch(error=>{
                console.log(error);
            });
        }
    }
}
</script>


