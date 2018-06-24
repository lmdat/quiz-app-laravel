@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        @if(session()->has('success-message'))
        <div class="text-centere">
            <p class="lead">{{ session()->get('success-message') }}</p>
        </div>
        <?php session()->flush();?>
        @endif
        <div class="text-center">
        <a href="{{route('get-welcome')}}" class="link-primary">Home page</a>
        </div>
    </div>
</div>

@stop