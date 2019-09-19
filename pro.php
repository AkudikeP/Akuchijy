<?php 
//header('Access-Control-Allow-Origin: *');

	$objConnect = mysql_connect("localhost","mobil4yp_tailor","admin@111");
	$objDB = mysql_select_db("mobil4yp_tailor");

	$email = $_POST['email'];
	
	$strSQL = "select * from tailors where temail='".$email."'";
	$arryItem = array();
	//$arryImg = array();
	$objQuery = mysql_query($strSQL) or die(mysql_error());
	//$arrRows = array();
	
	$arr = mysql_fetch_assoc($objQuery);
	array_push($arryItem ,$arr );
	

        echo json_encode($arryItem);

?>

