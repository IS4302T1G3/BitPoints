<!DOCTYPE html>
<html>
<body>

<?php
session_start();

if(isset($_SESSION)){
?>

<h2>Welcome <?php echo $_SESSION['email']; ?> </h2>

What would you like to do?<br><br>


<?php if($_SESSION['role'] == 'admin') { ?>

<a href="getAllMember.php">View All Members</a><br>
<a href="addMember.php">Add a new member</a><br><br>
<a href="getAllMerchant.php">View All Merchants</a><br>
<a href="addMerchant.php">Add a new merchant</a><br><br>
<a href="#">Add points for member</a><br>
<a href="getMember.php">Update Member particulars</a><br>
<a href="getMerchant.php">Update Merchant particulars</a><br>

<?php } ?>


<?php if($_SESSION['role'] == 'user') { ?>

<a href="#">View All Rewards</a><br>
<a href="#">Redeem Rewards</a><br>

<?php } ?>


<?php if($_SESSION['role'] == 'merchant') { ?>

<a href="viewAllRewards.php">List all Rewards</a><br>
<a href="addRewards.php">Add Rewards</a><br>
<a href="#">Delete Rewards</a><br>
<a href="#">Update Rewards</a><br>
<a href="#">Add points for Member</a><br>

<?php } ?>


<br>

<a href="logout.php">Logout</a><br>

<?php  } ?>

</body>
</html>

