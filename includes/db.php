<?php
  if(isset($_POST['import'])){
    //Creating a connection
    $servername ="localhost";
    $username = "root";
    $password = "";
    $database_name = $_POST['database_name'];
    $conn = new mysqli($servername,$username,$password);
    //Check Connections
    if($conn->connect_error){
      die ("Connection failed : ".$conn->connect_error);
    }
  //Creating a DataBase named $database_name
  $sql = "CREATE DATABASE $database_name";
  if($conn->query($sql) === TRUE){
    echo "<h4><i style='color: green;' class='fas fa-check-circle'></i> Database Created Successfully. </h4> ";
  }elseif($sql){
    echo "<h4><i style='color: green;' class='fas fa-check-circle'></i> Database Already Created Successfully. </h4> ";
  }else{
    echo "<h4 style='color: red;'><i class='fas fa-times-circle'>Error creating database : </h4>". $conn->error;
  //Closing connections
  // $conn->close();
  }
}
?>

