<template>
  <div id="app-profile">
      <div class="row">
        <div class="col-sm-10">
          <h1>{{ userdetail[0].username }} </h1>
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
          <ul class="list-group mt-4">
            <li class="list-group-item text-muted">Profile</li>
            <li class="list-group-item">
              <span class="pull-left">
                <strong>Joined</strong>
              </span> {{ userdetail[0].created_date  | formatDate  }}
            </li>
            <li class="list-group-item">
              <span class="pull-left">
                <strong>Email</strong>
              </span> {{ userdetail[0].email }}
            </li>
          </ul>

        </div>
        <div class="col-sm-9">
            <!-- <app-tweet></app-tweet> -->
          <h5 class="pl-3">Tweets</h5>
          <hr>
        <app-tweet v-for="tweet in tweets" :key="tweet.tweet_id" :tweet="tweet" ></app-tweet>
        </div>
      </div>
  </div>
  <!-- </div> -->
</template>
<script>
import Tweet from '../tweet/Tweet'
import axios from 'axios'
import moment from 'moment-timezone';
export default {
  props:['id'],
  components: {
    "app-tweet": Tweet
  },
   data: function () {
    return {
      tweets:null,
      userdetail:JSON.parse(localStorage.getItem("userdetail"))
    }
  },
  created(){
    var that = this;
    axios({
        method: 'get',
        url: 'http://localhost/users/profile.json',
        params: {
          userId: this.id
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
  },
  filters:{
      formatDate(value){
        return moment.tz(value, "Asia/Kolkata").format("DD-MM-YYYY HH:mm:ss");
      }
  }
};
</script>