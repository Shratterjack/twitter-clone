<template>
    <div class="my-3 p-3 rounded box-shadow" id="app-tweet-input">
        <form>
             <div class="form-group tweetInput">
                <textarea placeholder="What's Happening?" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                <button class="btn btn-sm btn-primary tweetButton">Tweet</button>
            </div>
        </form>
    </div>
</template>
<script>
export default {
    
}
</script>
<style scoped>
/* .tweetInput{
    border: 1px solid #DCDCDC;
} */

.tweetButton{
    float: right;
    margin-top:5px;
}
</style>