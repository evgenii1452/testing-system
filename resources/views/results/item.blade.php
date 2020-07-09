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
                    @each('results.chunks.test-results-item', $testResults, 'testResult')
                </tbody>
            </table>
        </div>
    </div>
@endsection