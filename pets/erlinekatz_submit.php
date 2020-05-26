<?php 
    session_start();

    // init session counter
    if(!isset($_SESSION['counter'])){
      echo "reseting session \n";
      $_SESSION['counter'] = 0;
    }
    

    define('__ROOT__', dirname(dirname(__FILE__)));
    include_once ($__ROOT__.'erlinekatz_functions.php');

    
    $counter = $_SESSION['counter'];
    
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
      .form-holder{
        margin: auto;
        margin-top: 1rem;
        padding: 1rem;
        width: 50%;
      }

      .btnHolder{
        text-align: center;
        margin: 1rem;
      }

     
    </style>
    <title>Pets survey</title>
  </head>
  <body >
  
    <div class="card form-holder">
    <h1>Pets survey</h1>

    
    <?php if($counter <3) { echo "
      <form method=\"POST\" action=\"erlinekatz_output.php\">"
        ."<div class=\"form-group\">"
          ."<label for=\"name\">What is your name?</label>"
          ."<input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" placeholder=\"Example: John Doe\">"
        ."</div>"

        ."<div class=\"form-group\">"
            ."<label for=\"pet\">What pats do you own?</label>"
            ."<select id=\"pet\" name=\"pet\" class=\"form-control\">"
                ."<option value=\"\" disabled selected>Choose a pet</option>"
                ."<option value=\"Cat\">Cat</option>"
                ."<option value=\"Dog\">Dog</option>"
                ."<option value=\"Moose\">Moose</option>"
                ."<option value=\"Tiger\">Bangal Tiger</option>"
            ."</select>"
        ."</div>"

        ."<div class=\"form-group\">"
          ."<input class=\"btn btn-primary\" type=\"submit\" value=\"Submit\">"
        ."</div>"
      ."</form>"
      ;}
      else{
          echo "<h4>Sorry! You have already submitted 3 answers.</h4><p>Try again tomorrow</p>";
      } ?>

    </div>

    <div class="btnHolder">
        <form action="erlinekatz_output.php" method="POST">
            <input class="btn btn-secondary" type="submit" name="all" value="View All" />
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>