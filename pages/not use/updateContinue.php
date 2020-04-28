<link href="../css/style.css" rel="stylesheet">
<div >
    <div class="modal-dialog modal-s">
      <div style="background-color:gray;color:white">
 
          <form method="post" action="">
              <label> Do you want to update?</label>
             <div class="row m-5 pb-5">
             <div class="col-sm-6">
             <input type="submit" value="Update"  class="btn btn-success btn-block" name="update">
             </div>
             <div class="col-sm-6">
             <input type="submit" value="cancel"  class="btn btn-light btn-block" >
             </div>
            </div>
          </form>       
      </div>
    </div>
  </div>
<?php
include('../database_connection.php');
if (isset($_POST['update'])) {
    $valueToInsert=$_COOKIE["dataToInsert"];
    $insertQUERY='INSERT INTO TRANSACTION (item_name, qty, date) VALUES  '.$valueToInsert.'';

    if(!$conn -> query( $insertQUERY))
    {
        printf("Error: %s\n", $conn->error);
    }
    else{
        echo "<script> alert('Insert successfully'); </script>";

    }

}

?>