<?php
include_once(__DIR__ . '/../Models/Quiz.php');

class quizController extends Controller{
    public function index(){
        if(isset($_POST['name'])){
            $_SESSION['name'] = $_POST['name'];
        }
        $qz = new Quiz();
        $quizzes = $qz->getAll();
        foreach ($quizzes as $key => $quiz) {
            $quizzes[$key]['questions'] = $qz->countQuestions($quiz['id']);
        }
        $this->render("/quiz/index", ['quizzes'=>$quizzes], "site");
    }

    public function store(){
        $qz = new Quiz();
        $quiz = [
            'quiz_name'=>$_POST['quiz_name'],
            'quiz_subject'=>$_POST['quiz_subject']
        ];
        $qz->add($quiz);
        header('Location: /quiz/index');    
    }

    public function destroy($id){
        $qz = new Quiz();
        $qz->delete($id);
        header('Location: /quiz/index');
    }

}

?>