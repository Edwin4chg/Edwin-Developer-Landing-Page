<?php
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header("Location: contact.html");
}


$name = $_POST['name'];
$email = $_POST['email'];
$budget = $_POST['budget'];
$message = $_POST['message'];

if(empty(trim($name))) $name = 'anonimo';



$body = <<<HTML
	<h1>Contacto desde la web</h1>
	<p>De: $name / $email</p>
    <p>Money: $budget</p>
	<h2>Mensaje</h2>
	$message
HTML;

$headers = "MIME-Version: 1.0 \r\n";
$headers.= "Content-type: text/html; charset=utf-8 \r\n";
$headers.=  "FROM: $name <$email> \r\n";
$headers.= "To: test@edwin4chg.com \r\n";


 
mail('test@edwin4chg.com', "Mensaje web: $name", $body, $headers); 
// var_dump($rta);


header("Location: ../index.html");
?>