<template>
  <div id="app">
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
    </nav>
    <main role="main" class="container">
        <div id="app-body">
            <router-view></router-view>
        </div>
    </main>
  </div>
</template>

<script>
import Navigation from "./components/common/Navigation";
import Home from './components/Home.vue';
import Profile from './components/users/Profile.vue'
import FollowUsers from './components/FollowUsers'
export default {
  name:'app',
  components: {
    "app-navigate": Navigation,
    "app-home": Home,
    "app-profile": Profile,
    "app-suggestion": FollowUsers,
  }
};
</script>
<style scoped>
#app {
  height: 100%;
  position: absolute;
  width: 100%;
}

#app-body {
  padding: 5rem;
}
</style>