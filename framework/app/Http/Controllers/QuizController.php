<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\User;

use App\Utils\Vii;

class QuizController extends Controller {

    public function __construct(){
        parent::__construct();
    }

    // Welcome page
    public function getWelcome(){
        return view(
            'home',
            []
        );
    }

    // Quiz page
    public function getQuiz(Request $request){

        // If the questions is equals the TOTAL_QUESTION in the quiz.php config file
        // We must redirect user to the result page
        $question_list = $request->session()->get('question-list', []);
        if(count($question_list) == config('quiz.TOTAL_QUESTION')){
            return redirect()->route('get-shown-result');
        }
        
        $question_fields = ['question.id', 'question.question_text'];
        $answer_fields = ['answer.id', 'answer.question_id', 'answer.answer_text'];

        // Get the questions that do not contain the question id in the question_list
        if(count($question_list) == 0){
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
                
        // Create ramdom question and shuffle the answers of this question
        $rand_question = Vii::randomQuestion($entries->toArray());
        $answers = $rand_question['answers'];
        shuffle($answers);
        
        return view(
            'quiz',
            [
                'form_uri' => route('post-quiz'),
                'qs' => '',
                'question' => $rand_question,
                'answers' => $answers,
                'question_list' => $request->session()->get('question-list', [])
            ]
        );
    }

    // Receive the submit answer
    public function postQuiz(Request $request){
        $question_count = $request->input('question_count', null);
        if($question_count != null && $question_count >= config('quiz.TOTAL_QUESTION')){
            return redirect()
                ->route('get-shown-result');
        }

        if($question_count == null){
            return redirect()->route('get-welcome');
        }

        
        $qid = $request->input('question_id', null);
        $answer_id = $request->input('answer', null);
        
        // Add the answered question id to the question-list
        if(!$request->session()->has('question-list')){
            $request->session()->put('question-list', [$qid]);
        }
        else{
            $questions = $request->session()->get('question-list');
            $questions[] = $qid;
            $request->session()->put('question-list', $questions);
        }

        // Add the submit answer id to the answer-list
        if(!$request->session()->has('answer-list')){
            $request->session()->put('answer-list', [$answer_id]);
        }
        else{
            $answers = $request->session()->get('answer-list');
            $answers[] = $answer_id;
            $request->session()->put('answer-list', $answers);
        }

        // If the questions is equals the TOTAL_QUESTION in the quiz.php config file
        // We must redirect user to the result page
        $ql = $request->session()->get('question-list', []);
        if(count($ql) == config('quiz.TOTAL_QUESTION')){
            $request->session()->put('shown-result', 1);
            return redirect()->route('get-shown-result');
        }

        // If not, we keep continue the quiz
        return redirect()->route('get-quiz');
    }

    // Result page
    public function getShownResult(Request $request){
        if($request->session()->get('shown-result', 0) == 0){
            session()->flush();
            return redirect()
                ->route('get-welcome');
        }

        $answers = $request->session()->get('answer-list');

        // Find the answers relies on the id list
        $entries = Answer::whereIn('id', $answers)
            ->select(['id', 'question_id', 'correct'])
            ->get();
        
        // Count the correct answer
        $total_correct = 0;
        foreach($entries as $a){
            if($a->correct == 1)
                $total_correct += $a->correct;
        }

        return view(
            'shown-result',
            [
                'form_uri' => route('post-add-user'),
                'qs' => '',
                'total_correct' => $total_correct,
                'total_question' => count($request->session()->get('question-list', [])),
            ]
        );

    }

    // Add user
    public function postAddUser(Request $request){
        $name = $request->input('your_name');
        $email = $request->input('your_email');

        $user = new User(['name' => $name, 'email' => $email]);
        
        if($user->save()){
            return redirect()
                ->route('get-thank-you')
                ->with('success-message', "Thank you <strong>" . $name . "</strong>. Your info has been stored!");
        }
            

        return redirect()
            ->route('get-shown-result')
            ->with('error-message', "Some errors occured. Please try again!");
    }

    // Thankyou page
    public function getThankyou(){
        if(!session()->has('success-message')){
            session()->flush();
            return redirect()
                ->route('get-welcome');
        }

        
        return view(
            'thank-you',
            []
        );
    }

    public function getVueQuiz(){
        return view(
            'vue-quiz',
            []
        );
    }

    // For test purpose
    public function getClearSession(){
        session()->flush();
        return redirect()->route('get-quiz');
    }

}