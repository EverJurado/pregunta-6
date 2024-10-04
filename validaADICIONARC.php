<?php
	$con = mysqli_connect("localhost", "root", "", "bdever");
	
	$id = $_GET["id"];
	$superficie =$_GET["superficie"];
	$xinicial =$_GET["xinicial"];
    $xFinal =$_GET["xFinal"];
    $yinicial =$_GET["yinicial"];
    $yFinal =$_GET["yFinal"];

	$sql = "INSERT INTO catastro (id, superficie, xinicial, xFinal, yinicial, yFinal) values ('$id','$superficie','$xinicial', '$xFinal','$yinicial', '$yFinal')";
	mysqli_query($con,$sql);
	header("Location: administrador.php")
	//header("Location: hollamundo.php")
?>