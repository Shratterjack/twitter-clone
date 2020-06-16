<template>
  <div id="app-body">
    <!-- <app-home></app-home> -->
    <app-follow></app-follow>
  </div>
</template>
<script>

import Home from '../Home'
import Profile from '../users/Profile'
import FollowUsers from '../FollowUsers'
export default {
  components: {
    "app-home": Home,
    "app-profile": Profile,
    "app-follow": FollowUsers,
  }
};
</script>
<style scoped>
#app-body {
  padding: 5rem;
}
</style>