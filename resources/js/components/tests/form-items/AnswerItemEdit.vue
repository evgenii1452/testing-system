<template>
    <div class="form-group answer-item">
        <input type="text"
               class="form-control mb-3"
               :name="`answers[`+ question_id + `][]`"
               :value="answer_data.answer_text"

        >
    </div>
</template>

<script>
    export default {
        props:['question_id', 'answer_data'],
        data() {
            return {

            }
        },
    }
</script>

<style scoped>

</style>