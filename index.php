<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
    
   
</head>
<body>
    <!-- Head Echo -->
    <div class='d-flex align-items-center justify-content-center'>
    <div id="print">Div to print</div>
    <button onclick='ClickMe()' type='button' class='btn btn-primary' >Click me now</button>
    </div>

    <!-- Books Buttons-->
    <form method="post">
    <div  class='d-flex align-items-center justify-content-center'>
    <input class='btn btn-primary m-4' type='submit' name='go' id='go' value='Open Books'></input>
    <input class='btn btn-primary m-4' type='submit' name='reset' id='reset' value='Reset Books'></input>
    <input class='btn btn-primary m-4' type='submit' name='orderbytitel' id='orderbytitel' value='Order by Titel'></input>
    <input class='btn btn-primary m-4' type='submit' name='orderbyheight' id='orderbyheight' value='Order by Height'></input>
    </div>

    <!-- Questions Buttons-->
    <form method="post">
    <div class='d-flex align-items-center justify-content-center'>
    <input class='btn btn-primary m-4' type='submit' name='goQuestions' id='goQuestions' value='Open Questions'></input>
    <input class='btn btn-primary m-4' type='submit' name='resetQuestions' id='resetQuestions' value='Reset Questions'></input>
    </div>


    <!-- Users Buttons-->
    <form method="post">
    <div class='d-flex align-items-center justify-content-center'>
    <input class='btn btn-primary m-4' type='submit' name='goUsers' id='goUsers' value='Open Users'></input>
    <input class='btn btn-primary m-4' type='submit' name='resetUsers' id='resetUsers' value='Reset Users'></input>
    </div>

    <!-- Add Book -->
    <div id='addbook' class='d-none  flex-column justify-content-center container p-5 my-5 bg-success text-white'>
    <label for="titel"> Add a Titel:</label>
    <input class='btn btn-light m-4' type='text' name='titel' id='titel'></input>
    
    <label for="author"> Add an Author:</label>
    <input class='btn btn-light m-4' type='text' name='author' id='author'></input>
    <br>
    <label for="genre"> Add a Genre:</label>
    <input class='btn btn-light m-4' type='text' name='genre' id='genre'></input>
    
    <label for="height"> Add a Height:</label>
    <input class='btn btn-light m-4' type='text' name='height' id='height'></input>
    <br>
    <label for="publisher"> Add a Publisher:</label>
    <input class='btn btn-light m-4' type='text' name='publisher' id='publisher'></input>
    
  
    
    <input class='btn btn-light m-4' type='submit' name='addtitel' id='addtitel' value='Add a Titel'></input>
    </div>


    <!-- Add Question -->
    <div  id='addquestion'  class='d-flex align-items-center justify-content-center  container  p-5 my-5 bg-success text-white''>
    <label for="titel"> Add a Question:</label>
    <input class='btn btn-light m-4' type='text' name='question' id='question' value=''></input>
    <input class='btn btn-light m-4' type='submit' name='addquestion' id='addquestion' value='Add a Question'></input>
    </div>
    
    <!-- Add User -->
    <div id='adduser' class='d-flex align-items-center justify-content-center container  p-5 my-5 bg-success text-white'>
    <label for="titel"> Add a User:</label>
    <input class='btn btn-light m-4' type='text' name='username' id='username' value=''></input>
    <input class='btn btn-light m-4' type='password' name='userpw' id='userpw' value=''></input>
    <input class='btn btn-light m-4' type='submit' name='adduser' id='adduser' value='Add a User'></input>
    </div>

    <!-- Login User -->
    <div class='d-flex align-items-center justify-content-center container  p-5 my-5 bg-dark text-white'>
    <label for="titel"> User-Login:</label>
    <input class='btn btn-primary m-4' type='text' name='logusername' id='logusername' value=''></input>
    <input class='btn btn-primary m-4' type='password' name='loguserpw' id='loguserpw' value=''></input>
    <input class='btn btn-primary m-4' type='submit' name='login' id='login' value='Login User'></input>
    </div>

    
    

    </form>
    
    <div class='d-flex align-items-center justify-content-center'>  
    <div id='viewer' class="col-md-4">

    <?php 
    include('docker/php/books.php');
    include('docker/php/questions.php');
    include('docker/php/user.php');
    ?>


</div> 
</div>

</body>
</html>