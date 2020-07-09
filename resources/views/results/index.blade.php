@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Тема</th>
                    <th scope="col">Вопрос</th>
                    <th scope="col">Ответ</th>
                </tr>
                </thead>
                <tbody>
                @foreach($testsResults as $testResults)
                    @each('results.chunks.test-results-item', $testResults, 'testResult')
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection