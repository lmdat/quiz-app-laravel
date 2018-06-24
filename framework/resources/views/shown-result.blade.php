@extends('layouts.main')

@section('content')
{!! Form::open(['url' => $form_uri . $qs, 'method' => 'post', 'name' => 'resultForm', 'id' => 'resultForm', 'role' => 'form', 'files' => false]) !!}
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h4 class="mb-3"><span class="text-success">Your Correct Answer(s):</span> <span class="badge badge-primary">{{$total_correct}} / {{$total_question}}</span></h4>
        <div class="text-center">
            <a href="{{route('get-play-again')}}" class="btn btn-sm btn-outline-primary">Play Again!</a>
        </div>
        
        <p class="mt-5 lead">
            Please fill the form below with your name and email if you would like to take part in a raffle.
        </p>
        <div class="pt-2 col-md-12 border">

            <div class="form-group">
                <label for="your_name">Your Name</label>
                <input type="text" class="form-control form-control-sm" name="your_name" id="your_name" placeholder="Your Name" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Your Email</label>
                <input type="email" class="form-control form-control-sm" name="your_email" id="your_email" placeholder="Your Email" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-info">Submit</button>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@stop