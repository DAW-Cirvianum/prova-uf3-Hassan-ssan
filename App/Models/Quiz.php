<?php

    include_once(__DIR__ . "/Orm.php");
    class Quiz extends Orm {

        public function __construct() {
            parent::__construct('quizzes');
        }

        public static function createTable(){
            $db = new Database();
            $sql = "CREATE TABLE IF NOT EXISTS `quiz`.`quizzes` (
                `id` INT NOT NULL AUTO_INCREMENT,
                `quiz_name` VARCHAR(100) NOT NULL,
                `quiz_subject` VARCHAR(100) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB;";
            $db->queryDataBase($sql);

        }

 
        public function getQuestionsById($id){
            $query = "SELECT * FROM questions where quiz_id = :quiz_id";
            $params = [
                ':quiz_id' => $id
            ];
            $db = new Database();
            $rs = $db->queryDataBase($query, $params)->fetchAll();
    
            return $rs;
        }

        public function countQuestions($id){
            $query = "SELECT * FROM questions WHERE quiz_id = :quiz_id";
            $params = [
                ':quiz_id' => $id
            ];  
            $db = new Database();
            $rs = $db->queryDataBase($query, $params)->rowCount();
            return $rs;
        }


        // public function sountQuestions($quizzes){
        //     foreach ($quizzes as $key => $qz) {
        //         $query = "SELECT * FROM questions WHERE quiz_id = :quiz_id";
        //         $params = [
        //             ':quiz_id' => $qz['id']
        //         ];
        //         $db = new Database();
        //         $rs = $db->queryDataBase($query, $params)->rowCount();

        //         $quizzes[$key]['question']
        //     }
        // }

    }

?>