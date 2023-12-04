<?php
include_once(__DIR__ . '/../Models/Quiz.php');
include_once(__DIR__ . '/../Models/Question.php');
include_once(__DIR__ . '/../Services/Database.php');

class questionController extends Controller{
    public function index($id){
        $qz = new Quiz();
        $quiz = $qz->getById($id);
        $qs = new Question();
        $questions = $qz->getQuestionsById($id);
        // echo '<pre>';
        // var_dump($questions);
        // echo '</pre>';
        $this->render("/question/index", ['quiz'=>$quiz, 'questions'=>$questions], "site");
    }

    public function destroy($id){
        $qs = new Question();
        $qs->delete($id);
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }


    public function store(){
        $question = [
            'question' => $_POST['question'];
            'quiz_id' => $_POST['quiz_id']
        ];
        $qs = new Question();
        
    }

}

?>