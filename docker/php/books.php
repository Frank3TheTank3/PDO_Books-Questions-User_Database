<?php


$pdo = new PDO('mysql:host=mysql;dbname=library', 'webDev', 'opport2022');
        $sql = "SELECT * FROM Books3";
        


    if(isset($_POST['go'])){
        
            foreach ($pdo->query($sql) as $row) {
            echo '<div class="container  p-5 my-5 bg-primary text-white ">';
            echo $row['Title']."<br />";
            echo $row['Author']."<br />";
            echo $row['Genre']."<br /><br />";
            echo $row['Height']."<br /><br />";
            echo $row['Publisher']."<br /><br />";
            echo '</div>';
            }
            echo "<script> document.getElementById('viewer').scrollIntoView();</script>";
            
            echo "<script> toggleAddBooks()</script>";
            
            /*
            echo "<script> var element = document.getElementById('addbook');
            element.classList.remove('d-none');</script>";
            
            echo "<script> var element = document.getElementById('addquestion');
            element.classList.add('d-none');</script>";

            echo "<script> var element = document.getElementById('adduser');
            element.classList.add('d-none');</script>";
            */
            

        }

        if(isset($_POST['reset'])){
        
            unset($_POST);
            $_POST = array();
            session_unset();
            echo 'Page reset' . "<br>";
            echo "<script> toggleCloseAll()</script>";
            
            

        }

        if(isset($_POST['orderbytitel'])){

            $sql = "SELECT * FROM Books3 ORDER BY Title";
            echo '<table><tr>';

            echo '<th>Title</th>';
            echo '<th>Author</th>';
            echo '<th>Genre</th>';
            echo '<th>Height</th>';
            echo '<th>Publisher</th>';
            foreach ($pdo->query($sql) as $row) {
            echo '<tr>';
            echo '<td>' . $row['Title'] . '</td>';
            echo '<td>' .$row['Author']. '</td>';
            echo '<td>' .$row['Genre']. '</td>';
            echo '<td>' .$row['Height']. '</td>';
            echo '<td>' .$row['Publisher']. '</td>';
            echo '</tr>';
            
            }
            echo '</tr></table>';

        }

        if(isset($_POST['orderbyheight'])){

            $sql = "SELECT * FROM Books3 ORDER BY Height";
        
            foreach ($pdo->query($sql) as $row) {
            echo '<div class="container  p-5 my-5 bg-primary text-white ">';
            echo $row['Title']."<br />";
            echo $row['Author']."<br />";
            echo $row['Genre']."<br /><br />";
            echo $row['Height']."<br /><br />";
            echo $row['Publisher']."<br /><br />";
            echo '</div>';
            }

        }

        if(isset($_POST['addtitel'])){
                if(isset($_POST['titel'])){
                    
                    $name = $_POST['titel'];
                }
                if(isset($_POST['author'])){
                    
                    $author = $_POST['author'];
                }
                if(isset($_POST['genre'])){
                    
                    $genre = $_POST['genre'];
                }
                if(isset($_POST['height'])){
                    
                    $height = $_POST['height'];
                }
                if(isset($_POST['publisher'])){
                    
                    $publisher = $_POST['publisher'];
                }
                
                
                
                
                $sql = 'INSERT INTO Books3(Title, Author, Genre, Height, Publisher) VALUES(:name, :author, :genre, :height, :publisher)';

                $statement = $pdo->prepare($sql);

                $statement->execute([
                    ':name' => $name,
                    ':author' => $author,
                    ':genre' => $genre,
                    ':height' => $height,
                    ':publisher' => $publisher
                ]);

                $publisher_id = $pdo->lastInsertId();

                echo 'The publisher id ' . $publisher_id . ' was inserted';
        
            }
        

        


?>
