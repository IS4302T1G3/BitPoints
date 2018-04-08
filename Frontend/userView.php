<!DOCTYPE html>
<html>
<body>

<?php
session_start();
if(isset($_SESSION)){
	echo 'Welcome $_SESSION['email']';
	
	
}else{
echo "Please login to view this page";
echo '<a href="./login.php">';
}
?>

?>
</body>
</html>