<template>
  <div class="media text-muted pt-3" id="app-suggestion">
    <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
      <div class="d-flex justify-content-between align-items-center w-100">
        <strong class="text-gray-dark">{{ suggestions['username']}} </strong>
        <a href="#">Follow</a>
      </div>
      <span class="d-block">{{ suggestions['email']}}</span>
    </div>
  </div>
</template>
<script>
export default {
      props:['suggestions']
}
</script>
