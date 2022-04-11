<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
    
   
</head>


  <body data-bs-spy="scroll" data-bs-target=".navbar">

 
    <nav class="navbar navbar-expand-lg navbar-dark bg-white">


        <div id="navcontainer" class="container">
            <img style="width: 100px" src="../../img/logo.jpg" alt="" class="navbar-brand logo-image">
          <button class="navbar-toggler" type="button" 
          data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
          aria-controls="navbarSupportedContent" aria-expanded="false" 
          aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
    
              <li class="nav-item">
                <a class="nav-link" href="javascript:hideButtonMenu()">Home</a>
              </li>
              <?php
              $_SESSION['loggedin'] = true;
              if($_SESSION['loggedin']== true)
              {
                echo'
              <li class="nav-item">
                <a class="nav-link" href="javascript:showButtonMenu()">Databases</a>
              </li>';
              }
             ?>
              
              <li class="nav-item">
                <a class="nav-link"  href="javascript:showContact()">Contact</a>
              </li>
             
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success bg-white" type="submit">Search</button>
            </form>
            
          </div>
        </div>
    </nav>

    <section id="home">

        <div class="container text-center">

            <div class="row justify-content-center">

            <div class="col-md-10">
                <h1 class="text-white display-4">The most reliable Databases in the world</h1>
                <p class="text-white"> We at Opportunity have perfected the art of efficiently
                    running databases for our clients.
                </p>


            </div>


            </div>



        </div>



    
    </section>  