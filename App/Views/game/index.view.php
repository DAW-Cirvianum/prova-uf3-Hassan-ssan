<?php
// echo '<pre>';
// var_dump($params);
// echo '</pre>';
// die();
?>
<form class="col-11 col-md-9 col-lg-7 col-xl-5 border p-4 my-4 mx-auto bg-light" action="/game/finish" method="post">
    <h2 class="text-success"><?php echo $params['quiz']['quiz_name'] ?></h2>

    <?php
    foreach ($params['questions'] as $qs) {
    ?>
        <ul>
            <h3><?php echo $qs['question'] ?></h3>
            <?php
            foreach ($qs['answers'] as $ans) {
            ?>
                <div class='form-check'><input class='form-check-input' type='radio' name='<?php echo $ans['id'] ?>' id='' value='1'><label class='form-check-label' for=''><?php echo $ans['answer'] ?></label></div>
            <?php
            }
            ?>
        </ul>
    <?php
    }
    ?>
    <input type="hidden" name="name" value="<?php echo $_SESSION['name'] ?>">
    <button type="submit" class="btn btn-primary mt-3">Finish</button>
    <a href="/main/index/" class="btn btn-danger mt-3">Exit</a>

</form>