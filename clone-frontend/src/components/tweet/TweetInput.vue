<template>
    <div class="my-3 p-3 rounded box-shadow" id="app-tweet-input">
        <form>
            <div class="form-group tweetInput">
                <textarea :placeholder="post" :value="input" @input="changeInput" class="form-control" id="tweetInput" rows="3"></textarea>
                <button class="btn btn-sm btn-primary tweetButton" type="button" @click="postTweet">Tweet</button>
            </div>
        </form>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    props:['post'],
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
            axios({
                method: 'get',
                url: 'http://localhost/tweets/add.json',
                data: {
                    tweet: this.input,
                    user_id:1
                },
                headers: {
                    'Content-Type': 'application/json',
                }
            }).then(function (response) {
                let result = response.data;
                alert(result.info);
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