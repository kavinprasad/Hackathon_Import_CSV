<?php include 'includes/header.php'; ?>
 
 <?php include 'includes/navbar.php'; ?>
 




 <br>
 <div class="container">


 
 <?php
if(isset($_POST['import'])){

$file = $_FILES["file"]["name"];
$temp_name = $_FILES['file']['tmp_name'];
$table = $_POST['table'];
$pass='';



$start_time = microtime(true);
 
ini_set('auto_detect_line_endings',TRUE);
$handle = fopen($temp_name,'r');


// Check the file 
if ( ($data = fgetcsv($handle) ) === FALSE ) {
?>	
<h2 style="text-align: center;">Cannot read from csv <?php echo $file;  ?>  </h2>
<?php
	die();
}
$fields = array();
$field_count = 0;

// Create Table Given table 
for($i=0;$i<count($data); $i++) {
    $f = strtolower(trim($data[$i]));
	
    if ($f) {
		$f = substr(preg_replace ('/[^0-9a-z]/', '_', $f), 0, 20);
        $field_count++;
        $fields[] = $f.' VARCHAR(50)';
		if($data[$i]=='password' || $data[$i]=='Password' ){
			$pass=$data[$i];
        
		}

    }
}

include 'includes/db.php';
// To Connect the Database
$conn=mysqli_connect("localhost","root","","$database_name");


// Create Table Given table 
$create_sql = "CREATE TABLE $table (" . implode(', ', $fields) . ')';
$reg1= mysqli_query($conn,$create_sql);

// Insert Data Database table
mysqli_query($conn, "
    	  LOAD DATA LOCAL INFILE '".$file."'
        INTO TABLE '.$table.'
        FIELDS TERMINATED BY \',\'
        LINES TERMINATED BY \'\n\'
		    IGNORE 1 LINES 
		"
);
if($reg1 ){
  echo "<h4><i style='color: green;' class='fas fa-check-circle'></i> Table Created Successfully."; 
  echo "<h4><i style='color: green;' class='fas fa-check-circle'></i> Columns Created Successfully."; 
}else{
  echo "<h4><i style='color: red;' class='fas fa-times-circle'></i> Error on Creating Table.";
}

// Encrypt The password
if($pass!=''){
$update_sql="UPDATE ".$table." SET ".$pass." = AES_ENCRYPT(".$pass.", 'encryption_key');";
$reg2= mysqli_query($conn,$update_sql);
}

// Show of no of records
$show_sql="SELECT * FROM ".$table;
$result = mysqli_query($conn,$show_sql);



$rows = mysqli_num_rows($result);


fclose($handle);
ini_set('auto_detect_line_endings',FALSE);
$end_time = microtime(true);
$execute_time = ($end_time - $start_time);


if($rows){
?>
<h4><i style='color: green;' class='fas fa-check-circle'></i> Created Table Successfully. </h4>
<div class="row">
    <div class="col-6">
      <h4>DataBase Name : <?php echo $database_name; ?></h4>
      <h4>Number of Record : <?php echo $rows; echo " "; ?> </h4>
    </div>
    <div class="col-6">
      <h4>Table Name : <?php echo $table; ?> </h4>
      <h4>Processing Time : <?php echo $execute_time;  ?> Seconds </h4>
    </div>
  </div>
<?php
}
else{
	?> 
	<h4 style="color: red;"><i class="fas fa-times-circle"></i>Error on Inserting Data</h4>	
	<?php
	}
}
?>
 </div>

 

 <br><br><br><br><br><br><br><br>
 <br><br><br><br>
 <br><br><br><br><br><br><br><br>

 <?php include 'includes/footer.php'; ?>
