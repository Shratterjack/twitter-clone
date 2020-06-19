<template>
  <div id="app-home">
    <app-tweet-input :post="post" @postChanged="post = $event"></app-tweet-input>
    <app-tweet v-for="tweet in tweets" :key="tweet.tweet_id" :tweet="tweet" ></app-tweet>
  </div>
</template>
<script>
import TweetInput from '../components/tweet/TweetInput';
import Tweet from '../components/tweet/Tweet';
import axios from 'axios';

export default {
  props:['id'],
  components: {
    "app-tweet-input": TweetInput,
    "app-tweet": Tweet
  },
  data: function () {
    return {
      tweets:null,
      post:"What's Happening?"
    }
  },
  mounted(){
    var that = this;
    axios({
        method: 'get',
        url: 'http://localhost/tweets/fetch.json',
        params: {
          userId: 1
        },
        headers: {
            'Content-Type': 'application/json',
        }
    }).then(function (response) {
        that.tweets = response.data;
    }).catch(error=>{
        console.log(error);
    });
  }
};
</script>
