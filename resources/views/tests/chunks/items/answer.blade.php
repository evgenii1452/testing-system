<div class="form-check">
    <input class="form-check-input" type="radio" name="{{$answer->question->slug}}" id="{{$answer->id}}" value="{{$answer->id}}">
    <label class="form-check-label" for="exampleRadios1">
        {{$answer->answer_text}}
    </label>
</div>