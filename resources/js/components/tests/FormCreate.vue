<template>
    <form method="POST" :action="route" id="form-create-test">

        <input type="hidden" name="_token" :value="csrf" >
        <input type="hidden" name="_method" :value="method" >

        <div class="form-group">
            <label for="theme">Тема теста</label>
            <input type="text" class="form-control" name="theme" id="theme">
        </div>

        <div class="form-group justify-content-end">
            <button
                    class="btn btn-primary float-right mb-3"
                    id="btn-add-question"
                    @click.prevent="addQuestion"
            >
                Добавить вопрос
            </button>
        </div>

        <div class="question-list">
            <question-item v-for="n in countQuestions"
                           :key="n"
                           :question_id="n">
            </question-item>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-lg btn-success" value="Создать">
        </div>

    </form>
</template>

<script>
    import QuestionItem from './form-items/QuestionItem'

    export default {
        props: {
            method: String,
            csrf: String,
            route: String
        },
        data() {
            return {
                countQuestions: 1,
            }
        },
        methods: {
            addQuestion() {
                this.countQuestions++
            }
        },
        components: {
            questionItem: QuestionItem
        }
    }
</script>

<style scoped>

</style>