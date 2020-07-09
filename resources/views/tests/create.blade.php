@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 justify-content-center">

                <form-create method="POST"
                             csrf="{{csrf_token()}}"
                             route="{{route('tests.store')}}"
                ></form-create>

            </div>
        </div>
    </div>

@endsection