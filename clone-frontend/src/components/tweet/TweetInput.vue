<template>
    <div class="my-3 p-3 rounded box-shadow" id="app-tweet-input">
        <form>
            <div class="form-group tweetInput">
                <textarea placeholder="What's Happening" :value="input" @input="changeInput" class="form-control" id="tweetInput" rows="3"></textarea>
                <button class="btn btn-sm btn-primary tweetButton" type="button" @click="postTweet">Tweet</button>
            </div>
        </form>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    props:['post','id'],
    data:function (params) {
        return{
            input:null
        }
    },
    methods:{
        changeInput(event){
            this.input = event.target.value;
            this.$emit('postChanged',this.input)
        },
        postTweet(){
            var that = this;
            axios({
                method: 'post',
                url: 'http://localhost/tweets/add.json',
                data: {
                    tweet: that.input,
                    user_id:that.id
                },
                headers: {
                    'Content-Type': 'application/json',
                }
            }).then(function (response) {
                let result = response.data;
                alert(result.info);
                that.input = null;
                that.$emit('tweetPosted')
            }).catch(error=>{
                console.log(error);
            });
        }
    }
}
</script>
<style scoped>
.tweetButton{
    float: right;
    margin-top:5px;
}
</style>