<?php
include_once(__DIR__ . '/../Models/Quiz.php');
include_once(__DIR__ . '/../Models/Question.php');
include_once(__DIR__ . '/../Models/Answer.php');

class scoreController extends Controller
{

    public function index($id)
    {
        $this->render("score/index", [], "site");
    }
}
