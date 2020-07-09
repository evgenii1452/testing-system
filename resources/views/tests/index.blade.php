@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 form-group">
                <a href="{{route('tests.create')}}">
                    <button class="btn btn-primary">Создать тест</button>
                </a>
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="20%" scope="col">id</th>
                    <th width="50%" scope="col">Тема</th>
                    <th width="30%" scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tests as $test)
                    <tr>
                        <th scope="row">#{{$test->id}}</th>
                        <td>
                            <a href="{{route('tests.show', ['test' => $test->id])}}">
                                {{$test->theme}}
                            </a>
                        </td>
                        <td>
                            <a class="d-inline-block" href="{{route('tests.edit', ['test' => $test->id])}}">
                                <button class="btn btn-primary">Изменить</button>
                            </a>
                            <form class="d-inline-block" method="POST"
                                  action="{{route('tests.destroy', compact('test'))}}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection