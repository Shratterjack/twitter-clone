<template>
    <div id="app-login" class="onboardClass">
    <form class="onboardForm">
    <div class="mb-3">
        <span class="h3 login-header">Log in to Twitter-Clone</span>
    </div>
      <label for="email" class="sr-only">Email address</label>
      <input type="email" v-model="email" id="email" class="form-control" placeholder="Email address" required autofocus>
      <label for="password" class="sr-only">Password</label>
      <input type="password" v-model="password" id="password" class="form-control mt-2" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block mt-2" type="button" @click="loginUser">Log in</button>
    <router-link to="/signup">Signup for Twitter Clone</router-link>

    </form>
    </div>
</template>
<script>
export default {
    data(){
        return {
            email:'',
            password:''
        }
    },
    methods:{
        loginUser(){
            let userdetails = `Email: ${this.email}, Password:${this.password}`;
            alert(userdetails);
            // this.$router.push('/si')
        }
    }
}
</script>


