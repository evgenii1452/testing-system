<template>
    <div class="form-group answer-item">
        <input type="text" class="form-control mb-3" :name="`answers[`+ question_id + `][]`">
    </div>
</template>

<script>
    export default {
        props:['question_id'],
        data() {
            return {

            }
        },
    }
</script>

<style scoped>

</style>