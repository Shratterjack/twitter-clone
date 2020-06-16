<template>
  <div id="app-layout">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Twiiter-Clone</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <app-navigate></app-navigate>
    </nav>
    <main role="main" class="container">
      <app-main-body></app-main-body>
    </main>
  </div>
</template>
<script>
import Navigation from "./common/Navigation.vue";
import MainBody from "./common/MainBody.vue";
export default {
  components: {
    "app-navigate": Navigation,
    "app-main-body": MainBody,
  }
};
</script>
<style scoped>
.app-sidebar {
  height: 100%;
  position: absolute;
  border-right: 1px solid #dcdcdc;
  width: 400px;
}
</style>