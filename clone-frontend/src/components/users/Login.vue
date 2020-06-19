<template>
    <div id="app-login" class="onboardClass">
    <form class="onboardForm"  @submit="loginUser">
    <div class="mb-3">
        <span class="h3 login-header">Log in to Twitter-Clone</span>
    </div>
      <label for="email" class="sr-only">Email address</label>
      <input type="email" v-model="email" id="email" class="form-control" placeholder="Email address" required autofocus>
      <label for="password" class="sr-only">Password</label>
      <input type="password" v-model="password" id="password" class="form-control mt-2" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block mt-2" type="submit" >Log in</button>
    <router-link to="/signup">Signup for Twitter Clone</router-link>

    </form>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data(){
        return {
            email:'',
            password:''
        }
    },
    methods:{
        loginUser(event){
            event.preventDefault();
            var that = this;
            axios({
                method: 'post',
                url: 'http://localhost/users/login.json',
                data: {
                    email: this.email,
                    password: this.password
                },
                headers: {
                    'Content-Type': 'application/json',
                }
            }).then(function (response) {
                let result = response.data;
                alert(result.info);
                if(result.status){
                    localStorage.setItem('userdetail', JSON.stringify(result.message));
                    that.$router.push('/home');
                    location.reload();

                }
            }).catch(error=>{
                console.log(error);
            });
        }
    }
}
</script>


