<?php
/*Functions for showing and adding Books to the MySQL Database*/

////////////////////////////////////////////
///////////////*PREPARE PDO*///////////////
//////////////////////////////////////////

/*

<?php

Execute a prepared statement by passing an array of values 
$sql = 'SELECT *
    FROM Books3
    ORDER BY author = :author';
$sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array('author' => 'Steven King'));
$red = $sth->fetchAll();

Array keys can be prefixed with colons ":" too (optional) 
$sth->execute(array(':author' => 'yellow'));
$yellow = $sth->fetchAll();
?>

*/

/*Create PDO and save as SESSION Var*/
$_SESSION['pdo']  = new PDO('mysql:host=mysql;dbname=library', 'webDev', 'opport2022');

function getSQLStatement($dataBase, $orderType)

{ 
    $_SESSION['sql'] = "SELECT * FROM $dataBase ORDER BY $orderType";

}

/*Print SQL Query with prepared SQL Statement*/
function printSQLStatement()
{
    
    echo '<table><tr>';
    echo '<th>Title</th>';
    echo '<th>Author</th>';
    echo '<th>Genre</th>';
    echo '<th>Height</th>';
    echo '<th>Publisher</th>';
    foreach ($_SESSION['pdo']  ->query($_SESSION['sql']) as $row) {
        echo '<tr>';
        echo '<td>' . $row['Title'] . '</td>';
        echo '<td>' . $row['Author'] . '</td>';
        echo '<td>' . $row['Genre'] . '</td>';
        echo '<td>' . $row['Height'] . '</td>';
        echo '<td>' . $row['Publisher'] . '</td>';
        echo '</tr>';
    }
    echo '</tr></table>';
    echo "<script> showButtonMenu()</script>";
    echo "<script> document.getElementById('viewer').scrollIntoView();</script>";
}

////////////////////////////////////////////
///////////////*OPEN BOOKS*////////////////
//////////////////////////////////////////

/*Open Books Database Button*/
if (isset($_POST['go'])) {
    getSQLStatement('Books3', 'Author');
    printSQLStatement();
}

/*Order Books by Title*/
if (isset($_POST['orderbytitel'])) {

     //$sql = "SELECT * FROM Books3 ORDER BY Title";

    getSQLStatement('Books3', 'Title');
    printSQLStatement();
    
}

/*Order Books by Height*/
if (isset($_POST['orderbyheight'])) {
    
    getSQLStatement('Books3', 'Height');
    printSQLStatement();
    
}

/*Add Books to Database Button*/

if (isset($_POST['add'])) {
    echo "<script> toggleAddBooks()</script>";
    echo "<script> document.getElementById('viewer').scrollIntoView();</script>";
}

////////////////////////////////////////////
//////////////*ADD BOOKS*//////////////////
//////////////////////////////////////////

/*Add new Book to Database*/
if (isset($_POST['addtitel'])) {
    /*Check for empty fields*/
    if (!empty($_POST['titel'])) {
        $name = $_POST['titel'];
    } else {
        echo 'Titel Missing';
        echo "<script>alert('Titel Missing')</script> ";
    }
    if (!empty($_POST['author'])) {
        $author = $_POST['author'];
    } else {
        echo 'Author Missing';
        echo "<script>alert('Author Missing')</script> ";
    }
    if (!empty($_POST['genre'])) {
        $genre = $_POST['genre'];
    } else {
        echo 'Genre Missing';
        echo "<script>alert('Genre Missing')</script> ";
    }
    if (!empty($_POST['height'])) {
        $height = $_POST['height'];
    } else {
        echo 'Height Missing';
        echo "<script>alert('Height Missing')</script> ";
    }
    if (!empty($_POST['publisher'])) {
        $publisher = $_POST['publisher'];
    } else {
        echo 'Publisher Missing';
        echo "<script>alert('Publisher Missing')</script> ";
    }

    /*Add Book Info to Database*/

    if (!empty($_POST['titel']) && !empty($_POST['author']) && !empty($_POST['genre']) && !empty($_POST['height']) && !empty($_POST['publisher'])) {
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
        foreach ($pdo->query($sql) as $row) {
            echo '<div class="container  p-5 my-5 bg-primary text-white ">';
            echo $row['Title'] . "<br />";
            echo $row['Author'] . "<br />";
            echo $row['Genre'] . "<br /><br />";
            echo $row['Height'] . "<br /><br />";
            echo $row['Publisher'] . "<br /><br />";
            echo '</div>';
        }
        echo "<script> document.getElementById('viewer').scrollIntoView();</script>";
        echo 'The publisher id ' . $publisher_id . ' was inserted';
        unset($_POST);
        $_POST = array();
    } else {
        echo 'Field Information Missing';
        echo "<script>alert('Please fill out all the fields')</script> ";
    }
}
