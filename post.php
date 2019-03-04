<?php
$handle = fopen("log.txt", "a");
foreach($_POST as $variable => $value) {
fwrite($handle, $variable);
fwrite($handle, "=");
fwrite($handle, $value);
fwrite($handle, "\r\n");
}
fwrite($handle, "\r\n\n\n\n");
fclose($handle);
echo '<meta http-equiv="refresh" content="0;URL=suggestions.html" />';


$conn = new mysqli("localhost", "root", "", "scheck");
$name= $_POST["name"];
$dob= $_POST["dob"];
	$dept= $_POST["dept"];
    $email= $_POST["email"];
    $password= $_POST["password"];
    
    

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$sql = "INSERT INTO register (name, dob, dept, email, password)
VALUES ('$name', '$dob', '$dept', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
	
    echo "New record created successfully ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


mysqli_close($conn);
exit;
?>