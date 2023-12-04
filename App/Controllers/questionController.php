<?php
include_once(__DIR__ . '/../Models/Quiz.php');
include_once(__DIR__ . '/../Models/Question.php');
include_once(__DIR__ . '/../Models/Answer.php');
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
            'question' => $_POST['question'],
            'quiz_id' => $_POST['quiz_id']
        ];
        $qs = new Question();
        $id = $qs->add($question, 'true');
        
        $ans = new Answer();
        $a1 = [
            'answer' => $_POST['a1'],
            'question_id' => $id
        ];
        $_POST['correct'] == 'a1' ? $a1['correct'] = 1 : $a1['correct'] = 0;
        $ans->add($a1, true);
        

        $ans = new Answer();
        $a2 = [
            'answer' => $_POST['a2'],
            'question_id' => $id
        ];
        $_POST['correct'] == 'a2' ? $a2['correct'] = 1 : $a2['correct'] = 0;
        $ans->add($a2);

        $ans = new Answer();
        $a3 = [
            'answer' => $_POST['a3'],
            'question_id' => $id
        ];
        $_POST['correct'] == 'a3' ? $a3['correct'] = 1 : $a3['correct'] = 0;
        $ans->add($a3);


        header('Location:' . $_SERVER['HTTP_REFERER']);
    }

}

?>