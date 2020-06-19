<template>
    <div id="app-follow" class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Suggestions</h6>

        <app-suggestion v-for="user in suggestions" :key="user.id" :suggestions="user" ></app-suggestion>
    </div>
</template>
<script>
import Suggestion from '../components/common/Suggestion';
import axios from 'axios';

export default {
    props:['id'],
    components:{
        'app-suggestion':Suggestion
    },
    data:function(){
        return {
            suggestions:null
        }
    },
    mounted(){
        var that = this;
        axios({
            method: 'get',
            url: 'http://localhost/users/suggest.json',
            params: {
                userId: this.id
            },
            headers: {
                'Content-Type': 'application/json',
            }
        }).then(function (response) {
            let result = response.data;

            let recipentArray = response.data.followed.map((inner,index)=>{
                return inner.recipent_id;
            })

            let suggestionList = response.data.suggestions.map((data,index)=>{
                if(recipentArray.includes(data.id)){
                    data['connection'] = true;
                }
                else{
                    data['connection'] = false;
                }
                return data;
            });

            that.suggestions = suggestionList;

        }).catch(error=>{
            console.log(error);
        });
    }
}
</script>