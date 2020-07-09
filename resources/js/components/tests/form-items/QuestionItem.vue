<template>
    <div class="card col-12 mb-3 question-item">
        <div class="card-body">
            <label for="question">Вопрос</label>
            <input type="text"
                   class="form-control mb-3"
                   :name="'questions[' + question_id + ']'"
                   id="question"
            >

            <button
                    class="btn btn-primary mb-3 float-right btn-add-answer"
                    @click.prevent="addAnswer"
            >
                Добавить вариант ответа
            </button>

            <div class="card col-12">
                <div class="card-body answer-list">
                    <label>Варианты ответа</label>
                    <answer-item :question_id="question_id"
                                 v-for="n in countAnswers"
                                 :key="n"
                    >
                    </answer-item>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import AnswerItem from "./AnswerItem";

    export default {
        props: {
            question_id: Number,
        },
        data() {
            return {
                countAnswers: 1
            }
        },
        methods: {
            addAnswer: function() {
                this.countAnswers++
            }
        },
        components: {
            answerItem: AnswerItem
        }

    }
</script>

<style scoped>

</style>