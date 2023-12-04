<?php
include_once(__DIR__ . '/../Models/Quiz.php');
include_once(__DIR__ . '/../Models/Question.php');
include_once(__DIR__ . '/../Models/Answer.php');

class gameController extends Controller
{

    public function index($id)
    {
        $qz = new Quiz();
        $quiz = $qz->getById($id);

        $questions = $qz->getQuestionsById($id);

        foreach ($questions as $key => $qs) {
            $questionModel = new Question();
            $questions[$key]['answers'] = $questionModel->getAnswersById($qs['id']);
        }

        $this->render("game/index", ['quiz' => $quiz, 'questions' => $questions], "site");
    }


    public function finish()
    {
        echo '<pre>';
        var_dump($_POST);
        echo '</pre>';
        die();
    }
}
