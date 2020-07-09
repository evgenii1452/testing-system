<div class="question-list">
    @foreach($questions as $questionNum => $question)
    <div
            class="card col-12 mb-3 question-item"
            v-for="n in countQuestions"
    >
        <div class="card-body">
            <label for="question">Вопрос</label>
            <input type="text"
                   class="form-control mb-3 question"
                   name="questions[{{$questionNum}}]"
                   value="{{$question->question_text}}"
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
                    @foreach($question->answers as $answerNum => $answer)
                        <div v-for="n in countAnswers" class="form-group answer-item">
                            <input type="text"
                                   class="form-control mb-3"
                                   name="answers[{{$questionNum}}][{{$answerNum}}]"
                                   value="{{$answer->answer_text}}"
                            >
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @endforeach
</div>

