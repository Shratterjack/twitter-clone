<template>
  <div id="app">
    <div v-if="userdetail !== null">
       <app-navbar @appLogout="userdetail = null"></app-navbar>
    </div>
    <main role="main" class="container">
        <div id="app-body" v-bind:style="changeBodyStyle">
            <router-view></router-view>
        </div>
    </main>
  </div>
</template>

<script>
import Navbar from "./components/common/Navbar";
import Home from './components/Home.vue';
import Profile from './components/users/Profile.vue'
import FollowUsers from './components/FollowUsers'
export default {
  name:'app',
  data:function () {
    return{
      userdetail:JSON.parse(localStorage.getItem("userdetail")),
      bodyStyle:''
    }
  },
  components: {
    "app-navbar": Navbar,
    "app-home": Home,
    "app-profile": Profile,
    "app-suggestion": FollowUsers,
  },
  mounted(){
    let userdetail = JSON.parse(localStorage.getItem("userdetail"));
    if(userdetail == null){
      this.$router.push('/login')
    }
    else{
      this.userdetail = userdetail;
    }
  },
  computed:{
    changeBodyStyle(){
      let bodyStyle = '';
      if(this.userdetail !== null){
        bodyStyle = {
          padding: '5rem'
        };
      }
      return bodyStyle
    }
  }
};
</script>
<style scoped>
#app {
  height: 100%;
  position: absolute;
  width: 100%;
}

/* #app-body {
  padding: 5rem;
} */

</style>