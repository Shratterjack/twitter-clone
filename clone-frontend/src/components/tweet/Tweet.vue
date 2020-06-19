<template>
  <div class="my-3 p-3 rounded box-shadow" id="app-tweet">
    <div class="card">
      <div class="card-body">
        <div class="media">
          <div class="media-body">
            <h6>{{ tweet['user'].username }}</h6>
            <span class="d-block">{{ tweet['user'].email }}</span>
          </div>
          <span>{{ tweet.tweet_date }}</span>
        </div>
        <p>{{ tweet.tweet }}</p>
      </div>
    </div>
  </div>
</template>
<script>
export default {
    props:['tweet']
}
</script>