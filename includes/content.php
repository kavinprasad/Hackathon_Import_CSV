<!-- Import Layout Starts Here  -->
<div class="container">
    <br><br>
    <h1 align="center" class="animate__animated animate__fadeInDown " >Importing CSV File Into Database Server</h1><br>
    <span id="message"></span>
<form action="tables.php" method="post" id="form" enctype="multipart/form-data">
  <div class="form-group ">
    <label for="exampleFormControlInput1">Data Base Name : </label>
    <input type="text" class="form-control" name="database_name" id="exampleFormControlInput1" placeholder="Enter Data Base Name">
  </div>
  <div class="form-group ">
    <label for="exampleFormControlInput1">Table Name : </label>
    <input type="text" class="form-control" id="file" name="table" id="exampleFormControlInput1" placeholder="Enter Data Base Name"><br>
  </div>

      <!-- Submit Form Starts Here  -->
      <div class="form-group">
        <label for="formFileLg" class="form-label uploadtext" >
          <i class="fas fa-cloud-upload-alt"></i>
          Upload or Drop Your Files Here
        </label>
          <input class="form-control form-control-lg" id="formFileLg" type="file" accept=".csv"  name="file">
        </div>
        
  <!-- Submit Form Ends Here  -->
    <div class="form-group" ><br>
        <input type="submit" value="Import" class="btn btn-primary" name="import">
    </div>



</form>

  </div>


<!-- Import Layout Starts Here  -->


