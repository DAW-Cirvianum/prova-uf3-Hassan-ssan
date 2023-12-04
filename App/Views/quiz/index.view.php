<form class="col-11 col-md-9 col-lg-7 col-xl-5 border p-4 my-4 mx-auto bg-light" action="/quiz/store" method="post">
    <h3>QuizzList</h3>
    </h2>
    <div class="mb-3">
        <label for="quiz_name" class="form-label">Quiz Name</label>
        <input type="text" class="form-control" name="quiz_name" id="quiz_name" aria-describedby="helpId" placeholder="">
    </div>
    <div class="mb-3">
        <label for="quiz_subject" class="form-label">Subject</label>
        <input type="text" class="form-control" name="quiz_subject" id="quiz_subject" aria-describedby="helpId" placeholder="">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>


</form>


<div class="llistat col-11 col-md-11 col-lg-10 col-xl-9 mx-auto mt-4">
    <table class="table">
        <h3>Hello admin - QuizzList</h3>
        <thead>
            <tr>
                <th scope="col">quiz_id</th>
                <th scope="col">Name</th>
                <th scope="col">Subject</th>
                <th scope="col">#Questions</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($params['quizzes'] as $quizz) {
            ?>
            <tr>
                <td><?php echo $quizz['id'] ?></td>
                <td><?php echo $quizz['quiz_name'] ?></td>
                <td><?php echo $quizz['quiz_subject'] ?></td>
                <td><?php echo $quizz['questions'] ?></td>
                <td><a class='btn btn-danger mx-2' href='/quiz/destroy/<?php echo $quizz['id'] ?>'>Delete</a><a class='btn btn-success' href='/question/index/<?php echo $quizz['id'] ?>'>Add Questions</a></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>