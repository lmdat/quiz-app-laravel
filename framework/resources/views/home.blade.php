@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-md-12 text-center">
        <p class="lead">Welcome to our Quiz</p>
        <a href="{{route('get-quiz')}}" class="btn btn-outline-success">Start Your Quiz!</a>
    </div>
</div>
@stop