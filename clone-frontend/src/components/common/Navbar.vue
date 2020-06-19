<template>
    <div id="app-navbar">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Twitter-Clone</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarsExampleDefault"
        aria-controls="navbarsExampleDefault"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <app-navigate></app-navigate>
        <button class="btn btn-outline-light my-2 my-sm-0" @click="logout" type="button">Logout</button>

    </nav>
</div>
</template>
<script>
import Navigation from '../common/Navigation'
export default {
    components:{
        'app-navigate':Navigation
    },
    methods:{
      logout(){
        let userdetail = localStorage.getItem("userdetail");
        localStorage.removeItem('userdetail');
        this.$router.push('/login')
        location.reload();
      }
    }
}
</script>