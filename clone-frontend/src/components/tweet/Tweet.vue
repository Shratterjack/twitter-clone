<template>
  <div class="my-3 p-3 rounded box-shadow" id="app-tweet">
    <div class="card">
      <div class="card-body">
        <div class="media">
          <div class="media-body">
            <p class="font-weight-bold">
              {{ tweet['user'].username }}
                <span class="font-weight-light">{{ tweet['user'].email }}</span>
              </p>
          </div>
          <span>{{ tweet.tweet_date | formatDate }}</span>
        </div>
        <p>{{ tweet.tweet }}</p>
      </div>
    </div>
  </div>
</template>
<script>
// import moment from 'moment';
import moment from 'moment-timezone';
export default {
    props:['tweet'],
    filters:{
      formatDate(value){
        return moment.tz(value, "Asia/Kolkata").format("DD-MM-YYYY HH:mm:ss");
      }
    }
}
</script>