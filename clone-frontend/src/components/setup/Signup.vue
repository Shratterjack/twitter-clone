<template>
    <div id="app-signup" class="onboardClass">
    <form class="onboardForm">
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
      <button class="btn btn-lg btn-primary btn-block mt-2" type="button" @click="signupUser">Sign up</button>
        <router-link to="/login">Already have an account? Log in</router-link>

    </form>
    </div>
</template>
<script>
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
        signupUser(){
            let userdetails = `Email: ${this.email}, Password:${this.password}`;
            alert(userdetails);
            // this.$router.push('/si')
        }
    }
}
</script>


