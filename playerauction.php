<?php




// Include the database configuration file

require_once 'dbconfig.php';

// woeklasdf


echo "insert into `auction`(teamno,playerno,amount)values(".$_POST["Team"].",".$_POST["PlayerNo"].",".$_POST["Amount"].");";
//"insert into `auction`(teamno,playerno,amount)values("+$_POST["Team"]+","+$_POST["PlayerNo"]+","+$_POST["Amount"]+");";


$sql = "insert into `auction`(teamno,playerno,amount)values(".$_POST["Team"].",".$_POST["PlayerNo"].",".$_POST["Amount"].");";
//"insert into `auction`(teamno,playerno,amount)values(1,1,100);";

if ($db->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


			echo "<br>";
           
		   echo $_POST["Team"];
			echo $_POST["PlayerNo"];


		header("Location: auction.php");
		


?>
