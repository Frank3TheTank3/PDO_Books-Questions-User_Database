<?php

//Start PDO Object - My SQL Login to database
$pdo = new PDO('mysql:host=mysql;dbname=library', 'webDev', 'opport2022');
        $sql = "SELECT * FROM Questions";

        $sql2 = "SELECT * FROM Answers WHERE QuestionIndex = 1";

        $sql3 = "SELECT * FROM Questions, Answers WHERE Questions.QuestionIndex = Answers.QuestionIndex";
        
 
//If set show questions
    if(isset($_POST['goQuestions'])){
        
            foreach ($pdo->query($sql3) as $row) {
            echo '<div class="container  p-5 my-5 bg-primary text-white ">';
            echo 'Question Number: ' . $row['QuestionIndex']."<br /><br />";
            echo 'Question Status: ' . $row['Status']."<br /><br />";
            echo $row['Question']."<br /><br />";
            echo $row['Answer_A']."<br />";
            echo $row['Answer_B']."<br />";
            echo $row['Answer_C']."<br />";
            echo $row['Answer_D']."<br /><br />";
            echo 'Correct Answer: ' . $row['CorrectAnswer']."<br />";
            /*
            foreach ($pdo->query($sql2) as $row2) {
                echo $row2['Answer_A']."<br />";
                echo $row2['Answer_B']."<br />";
                echo $row2['Answer_C']."<br />";
                
                }
                */
            echo '</div>';
            

            }
         
            echo "<script> document.getElementById('viewer').scrollIntoView();</script>";

            echo "<script> var element = document.getElementById('addquestion');
            element.classList.remove('d-none');</script>";

            echo "<script> var element = document.getElementById('addbook');
            element.classList.add('d-none');</script>";

            echo "<script> var element = document.getElementById('adduser');
            element.classList.add('d-none');</script>";

        }

//If set reset questions
        if(isset($_POST['resetQuestions'])){
        
            unset($_POST);
            $_POST = array();
            session_unset();
            echo 'Page reset' . "<br>";
            echo "<script> toggleCloseAll()</script>";

        }

//If set add questions
        if(isset($_POST['addquestion']))
        {

            

                if(!empty($_POST['question']))
                {
                
                    $question = $_POST['question'];
                }
                else
                {
                    echo'Question Missing';
                    echo "<script>alert('Question Missing')</script> ";  
                }
                if(!empty($_POST['answera']))
                {
                
                    $answera = $_POST['answera'];
                }
                else
                {
                    echo'Question Missing';
                    echo "<script>alert('Answer A Missing')</script> ";  
                }
                if(!empty($_POST['answerb']))
                {
                
                    $answerb = $_POST['answerb'];
                }
                else
                {
                    echo'Question Missing';
                    echo "<script>alert('Answer B Missing')</script> ";  
                }
                if(!empty($_POST['answerc']))
                {
                
                    $answerc = $_POST['answerc'];
                }
                else
                {
                    echo'Question Missing';
                    echo "<script>alert('Answer C Missing')</script> ";  
                }
                if(!empty($_POST['answerd']))
                {
                
                    $answerd = $_POST['answerd'];
                }
                else
                {
                    echo'Question Missing';
                    echo "<script>alert('Answer D Missing')</script> ";  
                }
                if(!empty($_POST['correct']))
                {
                
                    $correct = $_POST['correct'];
                }
                else
                {
                    echo'Question Missing';
                    echo "<script>alert('Correct Answer Missing')</script> ";  
                }


                if(!empty($_POST['question']) && !empty($_POST['answera']) && !empty($_POST['answerb']) 
                && !empty($_POST['answerc'])  && !empty($_POST['answerd']) && !empty($_POST['correct'])   )
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
                        ':id' => $questionID+1
                    ]);

                    //Create Insert with new question
                    $sql2 = 'INSERT INTO Answers(QuestionIndex, Answer_A, Answer_B, Answer_C, Answer_D, CorrectAnswer) 
                    VALUES(:id, :answera, :answerb, :answerc, :answerd, :correct )';
                    $statement = $pdo->prepare($sql2);

                    $statement->execute([
                        ':id' => $questionID+1,
                        ':answera' => $answera,
                        ':answerb' => $answerb,
                        ':answerc' => $answerc,
                        ':answerd' => $answerd,
                        ':correct' => $correct
                    ]);



                    $publisher_id = $pdo->lastInsertId();

                    echo 'The publisher id ' . $publisher_id . ' was inserted';
                
            

                }
                
                else
                {
                    echo'Field Information Missing';
                    echo "<script>alert('Please fill out all the fields')</script> ";  
                }
            
        
        }
        

        


?>
