<?php
/*Functions for showing and adding Questions to the MySQL Database*/

/*Start PDO & get query Result for Questions & Answers*/
$pdo = new PDO('mysql:host=mysql;dbname=library', 'webDev', 'opport2022');
$sql3 = "SELECT * FROM Questions, Answers WHERE Questions.QuestionIndex = Answers.QuestionIndex";

/////*OPEN Questions*/////

/*Open Questions Database Button*/
if (isset($_POST['goQuestions'])) {
    echo "<table style='right: 20%' width='1000px' ><tr>";
    echo '<th>Question Number</th>';
    echo '<th>Question Status</th>';
    echo '<th>Question</th>';
    echo '<th>Answer A</th>';
    echo '<th>Answer B</th>';
    echo '<th>Answer C</th>';
    echo '<th>Answer D</th>';
    echo '<th>Correct Answer</th>';
    foreach ($pdo->query($sql3) as $row) {
        echo '<tr>';
        echo '<td>' . 'Question Number: ' . $row['QuestionIndex'] . '</td>';
        echo '<td>' . 'Question Status: ' . $row['Status'] . '</td>';
        echo '<td>' . $row['Question'] . '</td>';
        echo '<td>' . $row['Answer_A'] . '</td>';
        echo '<td>' . $row['Answer_B'] . '</td>';
        echo '<td>' . $row['Answer_C'] . '</td>';
        echo '<td>' . $row['Answer_D'] . '</td>';
        echo '<td>' . $row['CorrectAnswer'] . '</td>';
        echo '</tr>';
    }
    echo "<script> showButtonMenu()</script>";
    echo "<script> document.getElementById('viewer').scrollIntoView();</script>";
}

/*Add Questions to Database Button*/
if (isset($_POST['addQuestions'])) {
    echo "<script> toggleAddQuestion()</script>";
    echo "<script> document.getElementById('viewer').scrollIntoView();</script>";
}

/////*ADD QUESTIONS*/////

/*Add new Question to Database*/
if (isset($_POST['addquestion'])) {
    /*Check for empty fields*/
    if (!empty($_POST['question'])) {
        $question = $_POST['question'];
    } else {
        echo 'Question Missing';
        echo "<script>alert('Question Missing')</script> ";
    }
    if (!empty($_POST['answera'])) {
        $answera = $_POST['answera'];
    } else {
        echo 'Question Missing';
        echo "<script>alert('Answer A Missing')</script> ";
    }
    if (!empty($_POST['answerb'])) {
        $answerb = $_POST['answerb'];
    } else {
        echo 'Question Missing';
        echo "<script>alert('Answer B Missing')</script> ";
    }
    if (!empty($_POST['answerc'])) {
        $answerc = $_POST['answerc'];
    } else {
        echo 'Question Missing';
        echo "<script>alert('Answer C Missing')</script> ";
    }
    if (!empty($_POST['answerd'])) {
        $answerd = $_POST['answerd'];
    } else {
        echo 'Question Missing';
        echo "<script>alert('Answer D Missing')</script> ";
    }
    if (!empty($_POST['correct'])) {
        $correct = $_POST['correct'];
    } else {
        echo 'Question Missing';
        echo "<script>alert('Correct Answer Missing')</script> ";
    }
    if (!empty($_POST['question']) && !empty($_POST['answera']) && !empty($_POST['answerb'])
        && !empty($_POST['answerc'])  && !empty($_POST['answerd']) && !empty($_POST['correct'])) 
        {
        //Get last ID in Table
        $stmt = $pdo->query("SELECT * FROM Questions ORDER BY QuestionIndex DESC LIMIT 1");
        $user = $stmt->fetch();
        $questionID = $user['QuestionIndex'];

        //Create Insert with new question
        $sql = 'INSERT INTO Questions(Question, Status, QuestionIndex) VALUES(:question, :status, :id)';
        echo $questionID;
        $statement = $pdo->prepare($sql);

        $statement->execute([
            ':question' => $question,
            ':status' => 'open',
            ':id' => $questionID + 1
        ]);

        //Create Insert with new question
        $sql2 = 'INSERT INTO Answers(QuestionIndex, Answer_A, Answer_B, Answer_C, Answer_D, CorrectAnswer) 
                    VALUES(:id, :answera, :answerb, :answerc, :answerd, :correct )';
        $statement = $pdo->prepare($sql2);
        $statement->execute([
            ':id' => $questionID + 1,
            ':answera' => $answera,
            ':answerb' => $answerb,
            ':answerc' => $answerc,
            ':answerd' => $answerd,
            ':correct' => $correct
        ]);
        $publisher_id = $pdo->lastInsertId();
        echo 'The question number ' . $publisher_id . ' was added to the database';
    } else {
        echo 'Field Information Missing';
        echo "<script>alert('Please fill out all the fields')</script> ";
    }
}
