<hr>
<h3>
    Вопрос: {{$question->question_text}}
</h3>
<ul>

    @foreach($question->answers as $answer)
    <div class="form-check">
        <input class="form-check-input"
               type="radio"
               name="questions[{{$question->id}}]"
               id="answer_{{$answer->id}}"
               value="{{$answer->id}}"
        >
        <label class="form-check-label" for="answer_{{$answer->id}}">
            {{$answer->answer_text}}
        </label>
    </div>
    @endforeach
</ul>
<hr>