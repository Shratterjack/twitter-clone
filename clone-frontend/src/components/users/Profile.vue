<template>
  <div id="app-profile">
    <!-- <div class="container"> -->
      <div class="row">
        <div class="col-sm-10">
          <h1>User name</h1>
        </div>
        <div class="col-sm-2">
          <a href="/users" class="pull-right">
            <img
              title="profile image"
              class="img-circle img-responsive"
              src="https://bootdey.com/img/Content/avatar/avatar1.png"
            />
          </a>
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
            <app-tweet></app-tweet>
        </div>
      </div>
    </div>
  <!-- </div> -->
</template>
<script>
import Tweet from '../tweet/Tweet'
export default {
  components: {
    "app-tweet": Tweet
  }
};
</script>