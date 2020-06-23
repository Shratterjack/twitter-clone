<template>
  <div class="media text-muted pt-3" id="app-suggestion">
    <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
      <div class="d-flex justify-content-between align-items-center w-100">
        <strong class="text-gray-dark">{{ suggestions['username']}} </strong>
        <button :disabled="getButtonState" :class="getButtonClass" @click="followUser">{{ getButtonText }}</button>
      </div>
      <span class="d-block">{{ suggestions['email']}}</span>
    </div>
  </div>
</template>
<script>
import axios from 'axios';
export default {
      props:['suggestions','id'],
      methods:{
        followUser(){
            event.preventDefault();
            var that = this;
            axios({
                method: 'post',
                url: 'http://localhost/users/follow.json',
                data: {
                    user_id: this.id,
                    recipent_id: this.suggestions.id
                },
                headers: {
                    'Content-Type': 'application/json',
                }
            }).then(function (response) {
                let result = response.data;
                alert(result.info)
                that.$emit('connectionMade');
                // location.reload();
            }).catch(error=>{
                console.log(error);
            });
        }
      },
      computed:{
        getButtonClass(){
            let baseClass = 'btn btn-sm';
            if(this.suggestions.connection){
              baseClass = `${baseClass} btn-success`;
            }
            else{
                baseClass = `${baseClass} btn-primary`;
            }
            return baseClass;
        },
        getButtonText(){
            let baseText = '';
            if(this.suggestions.connection){
              baseText = `Following`;
            }
            else{
                baseText = `Follow`;
            }
            return baseText;
        },
        getButtonState(){
            let disabled = this.suggestions.connection;
            return disabled;
        }
      }
}
</script>
