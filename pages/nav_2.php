

<script src="js/cookies.js"></script>
<div class="navbar navbar-inverse bg-inverse">

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">

      <input class="mr-sm-2" type="text" placeholder="Type item" id="searchVal">
      
      <input class="nav-link btn btn-primary  mr-sm-2" type="button" id="btnSearch" value="Search" >
       
      <h3 style="color:white; align:center;margin-left:10px">Welcome Diaz-Loria</h3>
      <ul class="navbar-nav ml-auto mr-1">
      <li class="nav-item">
          <a class="nav-link btn btn-primary  mr-sm-2" href="home.php">Home</a>
        </li> 
      <li class="nav-item">
          <a class="nav-link btn btn-primary  mr-sm-2" href="AddItemIndex.php">Add Item</a>
        </li>   
        <li class="nav-item">
          <a class="nav-link btn btn-danger  mr-sm-2" href="deleteItemIndex.php">Delete Item</a>
        </li>          
        <li class="nav-item">
          <!-- Save value for the type of transaction either transaction_bought or transaction_used-->
          <a class="nav-link btn btn-primary  mr-sm-2" href="updateDataIndex.php?transactionType=transaction_bought">Bought Items</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-primary  mr-sm-2" href="updateDataIndex.php?transactionType=transaction_used">Used Items</a>
        </li>  
        <form method="POST" action="">
          <input type="submit" value="Log-out"  class="btn btn-success btn-block" name="LogOut">
        </form>  
      </ul> 
  </nav>
</div>

<?php 

session_start();
//when the session has ended it will automatically redirectd to the log-in page
if(!isset($_SESSION['logged_in'])) {
    echo '<script>{window.location.href = "index.php"}</script>';  
}
//when the log-out button is clicked, it will clear all the cookies and sessions and it will automatically redirectd to the log-in page
  if (isset($_POST['LogOut'])) {

      //setcookie("dataToInsert", "", time() - 3600);
      //setcookie("dataToInsertMain", "", time() - 3600);
      //setcookie("transactionType", "", time() - 3600);
      //setcookie("searchVal", "", time() - 3600);
      echo "<script>removeCookies();</script>";
      session_destroy();
      echo '<script>if(confirm("You will be redirected to the log-in page.")) {window.location.href = "index.php"}</script>';  

  }

?>

<script>   
//this script is for the search button
let btnSearch=document.getElementById("btnSearch");
let searchValTxt=document.getElementById("searchVal");

//when the button is clicked, saved the value in the textbox and saved it as cookie to be used in searchpage later.
btnSearch.addEventListener("click",function(e){
  searchVal=searchValTxt.value;
  console.log(searchVal);
    document.cookie = `searchVal=${searchVal}`;
    location.href = "SearchIndex.php"
})

</script>
