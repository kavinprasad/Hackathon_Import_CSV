<!doctype html>
<html lang="en">
<?php include 'includes/header.php'; ?>
 

<body>




<?php
if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  if($username == 'ES20CS51' && $password = 'kavin'){
   
  }else{
    header("location: Login");
  }
}
?>




<?php include 'includes/navbar.php'; ?>


<?php include 'includes/content.php'; ?>


<br><br><br



 <?php include 'includes/footer.php'; ?>