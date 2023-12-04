<?php
class mainController extends Controller{
    public function index(){
        $this->render("home", [], "site");
    }
}

?>