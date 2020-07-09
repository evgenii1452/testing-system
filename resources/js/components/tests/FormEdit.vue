<template>
    <form method="POST" :action="route" class="form-create-test">

        <input type="hidden" name="_token" :value="csrf" >
        <input type="hidden" name="_method" :value="method" >

        <div class="form-group">
            <label for="theme">Тема теста</label>
            <input type="text"
                   class="form-control"
                   name="theme"
                   id="theme"
                   :value="theme"
            >
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
            <question-item v-for="(question, index) in questions"
                           :key="index"
                           :question_id="index"
                           :question_data="question"
            >
            </question-item>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-lg btn-success" value="Создать">
        </div>

    </form>
</template>

<script>
    import QuestionItem from './form-items/QuestionItemEdit'

    export default {
        props: {
            method: String,
            csrf: String,
            route: String,
            inputData: String,
            theme: String
        },
        data() {
            return {
                countQuestions: 1,
                questions: JSON.parse(this.inputData)
            }
        },
        methods: {
          addQuestion() {
              this.countQuestions++
              console.log(JSON.parse(this.inputData))
          }
        },
        components: {
            questionItem: QuestionItem
        },

    }
</script>

<style scoped>

</style>