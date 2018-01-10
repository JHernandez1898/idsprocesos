<?php
$paso = $_POST["paso"];
$ref = $_POST["ref"];
$fec = $_POST["fecha"];

switch($paso){
	case "1":
	
		header("Location: paso1.php?ref=$ref&&fec=$fec ");
	break;
	case "2":
		header("Location: paso2.php?ref=$ref");
	break;
	case "3":
		header("Location: paso3.php?ref=$ref");
	break;
	case "4":
		header("Location: paso4.php?ref=$ref");
	break;
	case "5":
		header("Location: paso5.php?ref=$ref");
	break;
	case "6":
		header("Location: paso6.php?ref=$ref");
	break;
	case "7":
		header("Location: paso7.php?ref=$ref");
	break;
	case "8":
		header("Location: paso8.php?ref=$ref");
	break;
	case "9":
		header("Location: paso9.php?ref=$ref");
	break;
	case "10":
		header("Location: paso10.php?ref=$ref");
	break;
	case "11":
		header("Location: paso11.php?ref=$ref");
	break;
	case "12":
		header("Location: paso12.php?ref=$ref");
	break;
	case "13":
		header("Location: paso13.php?ref=$ref");
	break;
	case "14":
		header("Location: paso14.php?ref=$ref");
	break;
	case "15":
		header("Location: paso15.php?ref=$ref");
	break;
	
}
 ?>
