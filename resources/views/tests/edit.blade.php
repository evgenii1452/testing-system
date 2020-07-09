@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 justify-content-center">
                <form-edit method="PUT"
                           csrf="{{csrf_token()}}"
                           route="{{route('tests.update', $test->id)}}"
                           theme="{{$test->theme}}"
                           input-data="{{json_encode($questions->toArray())}}"
                ></form-edit>

            </div>
        </div>
    </div>

@endsection