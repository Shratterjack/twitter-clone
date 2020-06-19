<template>
  <div id="app-profile">
      <div class="row">
        <div class="col-sm-10">
          <h1>User name</h1>
        </div>
        <div class="col-sm-2">
          <!-- <a href="/users" class="pull-right"> -->
            <img
              title="profile image"
              class="img-circle img-responsive"
              src="https://bootdey.com/img/Content/avatar/avatar1.png"
            />
          <!-- </a> -->
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <ul class="list-group">
            <li class="list-group-item text-muted">Profile</li>
            <li class="list-group-item text-right">
              <span class="pull-left">
                <strong>Joined</strong>
              </span> 2.13.2014
            </li>
            <li class="list-group-item text-right">
              <span class="pull-left">
                <strong>Last seen</strong>
              </span> Yesterday
            </li>
            <li class="list-group-item text-right">
              <span class="pull-left">
                <strong>Real name</strong>
              </span> Joseph Doe
            </li>
          </ul>

          <ul class="list-group">
            <li class="list-group-item text-muted">
              Activity
              <i class="fa fa-dashboard fa-1x"></i>
            </li>
            <li class="list-group-item text-right">
              <span class="pull-left">
                <strong>Shares</strong>
              </span> 125
            </li>
            <li class="list-group-item text-right">
              <span class="pull-left">
                <strong>Likes</strong>
              </span> 13
            </li>
            <li class="list-group-item text-right">
              <span class="pull-left">
                <strong>Posts</strong>
              </span> 37
            </li>
            <li class="list-group-item text-right">
              <span class="pull-left">
                <strong>Followers</strong>
              </span> 78
            </li>
          </ul>
        </div>
        <div class="col-sm-9">
            <!-- <app-tweet></app-tweet> -->
        <app-tweet v-for="tweet in tweets" :key="tweet.tweet_id" :tweet="tweet" ></app-tweet>
        </div>
      </div>
  </div>
  <!-- </div> -->
</template>
<script>
import Tweet from '../tweet/Tweet'
import axios from 'axios'
export default {
  components: {
    "app-tweet": Tweet
  },
   data: function () {
    return {
      tweets:null,
    }
  },
  mounted(){
    var that = this;
    axios({
        method: 'get',
        url: 'http://localhost/users/profile.json',
        params: {
          userId: 1
        },
        headers: {
            'Content-Type': 'application/json',
        }
    }).then(function (response) {
        let userTweetData = response.data[0].tweets;
        let tweetData = userTweetData.map((data,index)=>{
            let inner = {};
            inner = {...data};
            inner['user'] = {};
            inner['user'].id = response.data[0].id;
            inner['user'].username = response.data[0].username;
            inner['user'].email = response.data[0].email;
            inner['user'].created_date = response.data[0].created_date;
            return inner;
        });
        that.tweets = tweetData;
        console.log(response.data);
    }).catch(error=>{
        console.log(error);
    });
  }
};
</script>