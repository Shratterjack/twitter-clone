<template>
  <div id="app-home">
    <app-tweet-input :id="id" :post="post" @postChanged="post = $event" @tweetPosted="fetchActivity"></app-tweet-input>
    <app-tweet v-for="tweet in tweets" :key="tweet.tweet_id" :tweet="tweet" ></app-tweet>
  </div>
</template>
<script>
import TweetInput from "../components/tweet/TweetInput";
import Tweet from "../components/tweet/Tweet";
import axios from "axios";

export default {
  props: ["id"],
  components: {
    "app-tweet-input": TweetInput,
    "app-tweet": Tweet
  },
  data: function() {
    return {
      tweets: null,
      post: "What's Happening?"
    };
  },
  methods: {
    fetchActivity() {
      var that = this;
      axios({
        method: "get",
        url: "http://localhost/tweets/fetch.json",
        params: {
          userId: this.id
        },
        headers: {
          "Content-Type": "application/json"
        }
      })
      .then(function(response) {
        that.tweets = response.data;
      })
      .catch(error => {
        console.log(error);
      });
    }
  },
 
  mounted() {
    this.fetchActivity();
  }
};
</script>
