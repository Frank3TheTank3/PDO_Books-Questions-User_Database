<?php

//Start PDO Object - My SQL Login to database
$pdo = new PDO('mysql:host=mysql;dbname=library', 'webDev', 'opport2022');
        $sql = "SELECT * FROM Questions";

        $sql2 = "SELECT * FROM Answers WHERE QuestionIndex = 1";

        $sql3 = "SELECT * FROM Questions, Answers WHERE Questions.QuestionIndex = '1'";
        
 
//If set show questions
    if(isset($_POST['goQuestions'])){
        
            foreach ($pdo->query($sql3) as $row) {
            echo '<div class="container  p-5 my-5 bg-primary text-white ">';
            echo 'Question Number: ' . $row['QuestionIndex']."<br /><br />";
            echo 'Question Status: ' . $row['Status']."<br /><br />";
            echo $row['Question']."<br /><br />";
            echo $row['Answer_A']."<br />";
            echo $row['Answer_B']."<br />";
            echo $row['Answer_C']."<br /><br />";
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

            if(isset($_POST['question']))
            {

                if(!empty($_POST['question']))
                {
                
                    $question = $_POST['question'];
                
                
            
                    //Get last ID in Table
                    $stmt = $pdo->query("SELECT * FROM Questions ORDER BY id DESC LIMIT 1");
                    $user = $stmt->fetch();
                    $questionID = $user['id'];

                        //Create Insert with new question
                    $sql = 'INSERT INTO Questions(Question, Status, QuestionIndex) VALUES(:question, :status, :id)';
                    echo $lastID;
                    $statement = $pdo->prepare($sql);

                    $statement->execute([
                        ':question' => $question,
                        ':status' => 'open',
                        ':id' => $questionID+1
                    ]);

                    $publisher_id = $pdo->lastInsertId();

                    echo 'The publisher id ' . $publisher_id . ' was inserted';
                }
            }

            else
            {
                echo'Question Missing';
                echo "<script>alert('Question Missing')</script> ";  
            }
                
               
            
        
        }
        

        


?>
