@extends('layouts.main')

@section('content')
{!! Form::open(['url' => $form_uri . $qs, 'method' => 'post', 'name' => 'quizForm', 'id' => 'quizForm', 'role' => 'form', 'files' => false]) !!}
<div class="row">
    <div class="col-md-6 offset-md-3 border py-2">
        <?php $question_count = count($question_list); ?>
        <p><span class='lead'>Question({{($question_count + 1)}}/{{config('quiz.TOTAL_QUESTION')}}):</span> {{ $question['question_text'] }}</p>
        <p class='lead'>Answer:</p>
        <ul>
            @foreach($answers as $k=>$val)
            <li>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer" id="answer{{$loop->index}}" value="{{ $val['id'] }}">
                    <label class="form-check-label" for="answer{{$loop->index}}">
                        {{ $val['answer_text'] }}
                    </label>
                </div>
            </li>
            @endforeach
        </ul>   
        <div class="py-2 text-center">
            <button id="btn-answer" type="submit" class="btn btn-sm btn-info">Submit</button>
        </div>
    </div>
</div>
{!! Form::hidden('question_id', $question['id']) !!}    
{!! Form::hidden('question_count', $question_count) !!}    
{!! Form::close() !!}
@stop

@section('js-script')
<script>
    $(function(){
        $('#btn-answer').prop('disabled', true);
        $('input[name=answer]').iCheck({
            labelHover: false,
            cursor: true,
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });

        $('input[name=answer]').on('ifChecked', function(){
            $('#btn-answer').prop('disabled', false);
        });
    });
    
</script>
@stop