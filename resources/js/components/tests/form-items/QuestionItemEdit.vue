<template>
    <div class="card col-12 mb-3 question-item">
        <div class="card-body">
            <label for="question">Вопрос</label>

            <input type="text"
                   class="form-control mb-3"
                   :name="'questions[' + question_id + ']'"
                   id="question"
                   :value="question_data.question_text"
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
                                 v-for="(answer, index) in question_data.answers"
                                 :key="index"
                                 :answer_data="answer"
                    >
                    </answer-item>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import AnswerItem from "./AnswerItemEdit";

    export default {
        props: {
            question_id: Number,
            question_data: Object
        },
        data() {
            return {
                countAnswers: this.question_data.length
            }
        },
        methods: {
            addAnswer: function() {
                this.countAnswers++
                console.log(this.question_data)
            }
        },
        components: {
            answerItem: AnswerItem
        }

    }
</script>

<style scoped>

</style>