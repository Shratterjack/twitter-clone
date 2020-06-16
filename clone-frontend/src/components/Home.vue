<template>
  <div id="app-home">
    <app-tweet-input></app-tweet-input>
    <app-tweet></app-tweet>
    <app-tweet></app-tweet>
    <app-tweet></app-tweet>
  </div>
</template>
<script>
import TweetInput from '../components/tweet/TweetInput';
import Tweet from '../components/tweet/Tweet';
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