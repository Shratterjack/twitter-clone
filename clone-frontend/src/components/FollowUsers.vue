<template>
    <div id="app-follow" class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Suggestions</h6>
        <app-suggestion></app-suggestion>
        <app-suggestion></app-suggestion>
        <app-suggestion></app-suggestion>
    </div>
</template>
<script>
import Suggestion from '../components/common/Suggestion'
export default {
    components:{
        'app-suggestion':Suggestion
    }
}
</script>