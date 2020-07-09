@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 justify-content-center">
                <h2>Тема теста: {{$test->theme}}</h2>

                <form class="form-group" method="POST" action="{{route('results.store')}}">
                    @csrf
                    <input type="hidden" name="test_id" value="{{$test->id}}">
                    @each('tests.chunks.items.question', $test->questions, 'question')

                    <input type="submit" class="btn btn-lg btn-primary" value="Отправить">
                </form>
            </div>
        </div>
    </div>

@endsection