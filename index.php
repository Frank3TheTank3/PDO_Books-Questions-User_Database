<?php
include('docker/php/header.php');
?>




<form method="post">

<!-- Login User -->
<div class='rounded-pill d-flex align-items-center justify-content-center container  p-5 my-5 bg-dark text-white'>
    <label for="logusername"> Login:</label>
    <input class='btn btn-primary m-4' type='text' name='logusername' id='logusername' value=''></input>
    <label for="password"> Password:</label>
    <input class='btn btn-primary m-4' type='password' name='loguserpw' id='loguserpw' value=''></input>
    <input class='btn btn-primary m-4' type='submit' name='login' id='login' value='Login User'></input>
</div>
<!-- Books Buttons-->
    <div id='buttonmenu' class='d-none d-flex align-items-center justify-content-center '>
        <input class='btn btn-primary m-4' type='submit' name='go' id='go' value='Open Books'></input>
        <input class='btn btn-secondary m-4' type='submit' name='orderbytitel' id='orderbytitel' value='Order by Titel'></input>
        <input class='btn btn-secondary m-4' type='submit' name='orderbyheight' id='orderbyheight' value='Order by Height'></input>

        <!-- Questions Buttons-->
        <input class='btn btn-primary m-4' type='submit' name='goQuestions' id='goQuestions' value='Open Questions'></input>

        <!-- Users Buttons-->
        <input class='btn btn-primary m-4' type='submit' name='goUsers' id='goUsers' value='Open Users'></input>
        <input class='btn btn-danger m-4' type='submit' name='resetall' id='resetall' value='Logout'></input>
    </div>

    <!-- Add Book -->
    <div id='addbook' class='d-none flex-column justify-content-center container p-5 my-5 bg-success text-white'>
        <label for="titel"> Add a Titel:</label>
        <input class='btn btn-light m-4' type='text' name='titel' id='titel'></input>
        <label for="author"> Add an Author:</label>
        <input class='btn btn-light m-4' type='text' name='author' id='author'></input>
        <label for="genre"> Add a Genre:</label>
        <input class='btn btn-light m-4' type='text' name='genre' id='genre'></input>
        <label for="height"> Add a Height:</label>
        <input class='btn btn-light m-4' type='text' name='height' id='height'></input>
        <label for="publisher"> Add a Publisher:</label>
        <input class='btn btn-light m-4' type='text' name='publisher' id='publisher'></input>
        <input class='btn btn-light m-4' type='submit' name='addtitel' id='addtitel' value='Add a Titel'></input>
    </div>

    <!-- Add Question -->
    <div id='addquestion' class='d-none  flex-column justify-content-center container p-5 my-5 bg-success text-white'>
        <label for="titel"> Add a Question:</label>
        <input class='btn btn-light m-4' type='text' name='question' id='question' value=''></input>
        <label for="publisher"> Add a Answer A:</label>
        <input class='btn btn-light m-4' type='text' name='answera' id='answera' value=''></input>
        <label for="publisher"> Add a Answer B:</label>
        <input class='btn btn-light m-4' type='text' name='answerb' id='answerb' value=''></input>
        <label for="publisher"> Add a Answer C:</label>
        <input class='btn btn-light m-4' type='text' name='answerc' id='answerc' value=''></input>
        <label for="publisher"> Add a Answer D:</label>
        <input class='btn btn-light m-4' type='text' name='answerd' id='answerd' value=''></input>
        <label for="publisher"> Add a Correct Answer:</label>
        <input class='btn btn-light m-4' type='text' name='correct' id='correct' value=''></input>
        <input class='btn btn-light m-4' type='submit' name='addquestion' id='addquestion' value='Add a Question'></input>
    </div>

    <!-- Add User -->
    <div id='adduser' class='d-none d-flex align-items-center justify-content-center container  p-5 my-5 bg-success text-white'>
        <label for="titel"> Add a User:</label>
        <input class='btn btn-light m-4' type='text' name='username' id='username' value=''></input>
        <input class='btn btn-light m-4' type='password' name='userpw' id='userpw' value=''></input>
        <input class='btn btn-light m-4' type='submit' name='adduser' id='adduser' value='Add a User'></input>
    </div>

    <!-- Contact Form -->
    <div id='contact' class="container d-none">
  <form action="index.php">

    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">

  </form>
</div>



</form>

<div class='container justify-content-center'>
    <div id='viewer' class=" container">
    </div>
</div>
<?php
include('docker/php/books.php');
include('docker/php/questions.php');
include('docker/php/user.php');
?>

<style>
    tr:nth-child(even) {
        background-color: #4C8BF5;
        color: white;
    }

    td {
        width: 250px;
        min-width: 200px;
        /*border-radius: 8px;*/
    }

    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200;400&display=swap');

    table {
        margin-left: auto;
        margin-right: auto;
    }

    body {

        line-height: 1.8;
        color: black;
        font-size: 18px;
        font-family: 'Raleway', sans-serif;

    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {

        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: white;

    }

    .lowercase {

        text-transform: lowercase;
    }

    .title-sm {
        font-size: 14px;
        letter-spacing: 1px;
        color: white;

    }

    a {
        font-weight: 700;
        transition: all 0.4s ease;
    }

    p {

        font-size: 20px;
    }


    .displayimage {

        height: 400px;
    }

    .displayimage {

        height: 300px;
    }

    img {

        width: 100%;

    }

    small {

        font-size: 12px;
        letter-spacing: 2px;
        font-weight: 700;
    }

    section {
        padding-top: 100px;
        padding-bottom: 100px;


    }

    #navcontainer {

        color: white;
        background-image: url(../img/dt2.jpg);
        opacity: 0.8;
        border-radius: 10px;
    }

    .navbar {


        background-repeat: space;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        background-position-x: right;
        background-color: skyblue;
        color: white;
    }

    .logo-text {
        font-size: 22px;
        text-transform: uppercase;
        color: white;
    }



    .navbar .nav-link {

        font-size: 18px;
        text-transform: uppercase;
        letter-spacing: 1px;


    }

    .navbar-light .navbar-nav .nav-link.active {

        color: white;
    }

    #home {
        min-height: 50vh;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        background-image: linear-gradient(to bottom right, red, yellow);
        display: flex;
        align-items: center;


    }

    #home h1 {
        font-weight: 700;


    }

    #home p {

        max-width: 550px;
        margin: 25px auto;
    }

    /* Style inputs with type="text", select elements and textareas */
input[type=text], select, textarea {
  width: 100%; /* Full width */
  padding: 12px; /* Some padding */ 
  border: 1px solid #ccc; /* Gray border */
  border-radius: 4px; /* Rounded borders */
  box-sizing: border-box; /* Make sure that padding and width stays in place */
  margin-top: 6px; /* Add a top margin */
  margin-bottom: 16px; /* Bottom margin */
  resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
  background-color: #45a049;
}
</style>


</div>
</div>

</body>

</html>