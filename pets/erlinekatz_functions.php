<?php 
session_start();

define("DBHOST", "localhost");
define("DBDB",   "pets");
define("DBUSER", "pets_user");
define("DBPW", "!Qwer1234!");
define("TBL", "pets");


// clean html vals
function sanitize_html($htmlVal){
    return htmlentities($htmlVal);
  }

function increment_session_count(){
    if(isset($_SESSION['counter'])){
        $_SESSION['counter']++;
    }
}

  // insert form data to SQL if POST is set
  function insert_data(){
      if(isset($_POST['name']) && isset($_POST['pet'])){
        // insert to DB
        saveSurvey();

        // increment counter
        increment_session_count();

        return true;
      }
      else{
          return false;
      }
    
  }

  // db connection
  function connectDB(){
    $dsn = "mysql:host=".DBHOST.";dbname=".DBDB.";charset=utf8";
    try{
        $db_conn = new PDO($dsn, DBUSER, DBPW);
        return $db_conn;
    } catch (PDOException $e){
        echo "<p>Error opening survey database <br/>\n".$e->getMessage()."</p>\n";
        exit(1);
    }
}

// save new entry
function saveSurvey(){
    $db_conn = connectDB();
    $field_data = array();
    $qry_ct = "INSERT INTO ".TBL. " SET ";

    // add name
    $qry_ct .= "name= ?";
    $field_data[] = sanitize_html($_POST['name']);

    // add pet
    $qry_ct .= ", pet= ?";
    $field_data[] = sanitize_html($_POST['pet']);

    // prepare statement
    $stmt = $db_conn->prepare($qry_ct);
	if (!$stmt){
		echo "<p>Error in entry prepare: ".$stmt->errorCode()."</p>\n<p>Message ".implode($stmt->errorInfo())."</p>\n";
		exit(1);
    }
    
    //execute statement
	$status = $stmt->execute($field_data);
	if (!$status){
		echo "<p>Error in entry execute: ".$stmt->errorCode()."</p>\n<p>Message ".implode($stmt->errorInfo())."</p>\n";
		exit(1);
    }
    
    unset($field_data);
}

function select_data(){
    $db_conn = connectDB();
    if (!$db_conn){
    	echo "<p>Error connecting to the database</p>\n";
    } else {
    	$stmt = $db_conn->prepare("SELECT * from ".TBL.";");
    	if (!$stmt){
    		echo "<p>Error preparing to read data from the database</p>\n";
    	} else {
    		$status = $stmt->execute();
    		if(!$status){
    		echo "<p>Error reading data from the database</p>\n";
    		} else {
    			if ($stmt->rowCount() > 0){
                    // loop through rows and output table columns
					while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    					echo "<tr><td>";
    					echo $row['name'];
    					echo "</td><td>";
    					echo $row['pet'];
    					echo "</td><td>";
    					echo $row['added'];
    					echo "</td></tr>";
    				}
    			}
    
    		}
    	}
    
	}

}



?>