<?php 

  define('__ROOT__', dirname(dirname(__FILE__)));
  include_once ($__ROOT__.'erlinekatz_functions.php');
  
  $insertedNew = insert_data();
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
      h2{
        color: green;
      }
      div{
        margin: 2% 20%;
      }
    </style>
    <title>Pets survey output</title>
  </head>
  <body>
    
      <?php 
        if($insertedNew){
            echo "<div class=\"alert alert-success\">Pet added successfully!</div>";
        }
      ?>

      <div class="btnHolder">
          <form action="erlinekatz_submit.php" method="POST">
              <input class="btn btn-secondary" type="submit" name="another" value="Submit Another Pet" />
          </form>
      </div>

      <div>
          <table class="table">
            <tr class="table-warning">
              
                  <th>Name</th>
                  <th>Pet</th>
                  <th>Date Added</th>
              
              </tr>
              <?php 
                select_data();
              ?>
          </table>
      </div>
     
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
