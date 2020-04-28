
<script src="js/cookies.js"></script>

<!-- FOR CONTINUE TO UPDATE PAGE-->
<div class="col-md-5 offset-md-3 " style="margin-top:100px;margin-left:50px;">
      <div style="background-color:gray;color:white;align:center" class="rounded">
      <h3> Do you want to update?</h3>
          <form method="post" action="">
              
             <div class="row m-5 pb-5">
                <div class="col-sm-6">
                <input type="submit" value="Update"  class="btn btn-success btn-block" name="update">
                </div>
                <div class="col-sm-6">
                <input type="submit" value="cancel"  class="btn btn-light btn-block" name="cancel">
                </div>
            </div>
          </form>       
      </div>

</div>

<?php
// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

include('database_connection.php');
//WHEN THE UPDATE OF BUTTON IS CLICKED, DO THE FOLLOWING
if (isset($_POST['update'])) {
  //saved the cookie (from updateDataPage)
    $valueToInsert=$_COOKIE["dataToInsert"];
    $dataToInsertMain=$_COOKIE["dataToInsertMain"];
    $transactionType=$_COOKIE['transactionType'];

    //echo "<script>removeCookies();</script>";
    //insert values to the transaction table.
    $insertQUERY="INSERT INTO $transactionType (cat_id,item_name, qty, date) VALUES  $valueToInsert;";  
    //insert values to the cat_items table. this is to update the value of the item with change quantity
    $insertQUERYMain="REPLACE INTO cat_items (cat_id,item_name, currentCount) VALUES  $dataToInsertMain;";  
    
    //saved the two queries in one sql variable to have multiple query at a time
    $sql =  $insertQUERY;
    $sql .=  $insertQUERYMain;

    if ($conn->multi_query($sql) === TRUE) {//execute the two queries
      
      //after execution, clear the cookies and redirect to the home page
      setcookie("dataToInsert", "", time() - 3600);
      setcookie("dataToInsertMain", "", time() - 3600);
      setcookie("transactionType", "", time() - 3600);
      //echo "<script>removeCookies();</script>";
      echo '<script>if(confirm("Insert Successfuly!")) {window.location.href = "home.php"}</script>';   

    } else {
      //else dispaly the error
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  
    $conn->close();


}
//if the cancel button is clicked, , clear the cookies and redirect to the home page
else if (isset($_POST['cancel'])) {
  setcookie("dataToInsert", "", time() - 3600);
  setcookie("dataToInsertMain", "", time() - 3600);
  setcookie("transactionType", "", time() - 3600);
  //echo "<script>removeCookies();</script>";
  echo '<script>if(confirm("All data will be lost.")) {window.location.href = "home.php"}</script>';   
}
?>