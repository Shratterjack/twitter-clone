<template>
  <div id="app-body">
    <app-tweet-input></app-tweet-input>
    <app-tweet></app-tweet>
    <app-tweet></app-tweet>
    <app-tweet></app-tweet>
  </div>
</template>
<script>
import TweetInput from "../tweet/TweetInput.vue"
import Tweet from "../tweet/Tweet.vue"
export default {
  components: {
    "app-tweet-input": TweetInput,
    "app-tweet": Tweet
  }
};
</script>
<style scoped>
#app-body {
  padding: 5rem;
}
</style>