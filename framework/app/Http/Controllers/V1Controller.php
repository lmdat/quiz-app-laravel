<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\User;

use App\Utils\Vii;

class V1Controller extends Controller {

    public function __construct(){
        parent::__construct();
    }

    // Get ramdom question
    public function postRandomQuiz(Request $request){
        $question_fields = ['question.id', 'question.question_text'];
        $answer_fields = ['answer.id', 'answer.question_id', 'answer.answer_text'];

        $question_list = $request->input('question_list', []);
        
        $count_question = count($question_list);

        // Get the questions that do not contain the question id in the question_list
        if($count_question == 0){
            $entries = Question::select($question_fields)
            ->with(['answers' => function($q) use($answer_fields){
                $q->select($answer_fields);
            }])->get();
        }
        else{
            $entries = Question::whereNotIn('question.id', $question_list)
            ->select($question_fields)
            ->with(['answers' => function($q) use($answer_fields){
                $q->select($answer_fields);
            }])->get();
        }

        // Get random question
        $rand_question = Vii::randomQuestion($entries->toArray());
        // Making shuffle for the answers
        shuffle($rand_question['answers']);
        
        $data = [
            'question' => $rand_question,
            'total_question' => config('quiz.TOTAL_QUESTION')
        ];

        return response()->json($data, 200, [], JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);

    }

    // Get result
    public function postResult(Request $request){
        $answer_list = $request->input('answer_list', []);
        
        // Find answers relies on the answer id list
        $entries = Answer::whereIn('id', $answer_list)
            ->select(['id', 'question_id', 'correct'])
            ->get();
        
        // Count the correct answer
        $total_correct = 0;
        foreach($entries as $a){
            if($a->correct == 1)
                $total_correct += $a->correct;
        }

        $data = [
            'total_correct' => $total_correct,
            'total_question' => config('quiz.TOTAL_QUESTION')
        ];

        return response()->json($data, 200, [], JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
    }


    // Add user info
    public function postAddUser(Request $request){
        $name = $request->input('your_name');
        $email = $request->input('your_email');

        $user = new User(['name' => $name, 'email' => $email]);
        
        if($user->save()){
            $data = [
                'message' => "Thank you <strong>" . $name . "</strong>. Your info has been stored!"
            ];
            return response()->json($data, 200, [], JSON_UNESCAPED_UNICODE);
        }
        
        $data = [
            'message' => "Some errors occured. Please try again!"
        ];
        return response()->json($data, 400, [], JSON_UNESCAPED_UNICODE);
    }

}