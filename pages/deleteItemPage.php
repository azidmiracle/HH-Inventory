<script src="js/cookies.js"></script>

<!-- DIV FOR DeleteING ITEMS-->

    <div class="modal-dialog modal-xl" style="margin-top:100px;margin-left:50px;">
      <div class="modal-content">
        <div class="modal-header ">
            <form method="POST" action="" >
                <div class="form-group col-sm">
                    <label for="itemAll">Select Category</label>
                    <select id="itemAll" name="itemAll" class="form-control chosenSelect" >
                    </select>
                    <hr>
                    <br>
                    <a class="nav-link btn btn-danger  mr-sm-2" data-toggle="modal" data-target="#myModal-Delete" >Delete</a>
                </div>
            </form>
        </div>          
      </div>
    </div>


  <div class="modal fade text-center" id="myModal-Delete">
    <div class="modal-dialog modal-s">
      <div class="modal-content">
 
          <form method="post" action="">
              <label> Do you want to delete?</label>
             <div class="row m-5 pb-5">
                <div class="col-sm-6">
                    <input type="submit" value="Delete"  class="btn btn-danger btn-block" name="Deleteitem">
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
// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

include('database_connection.php');

//get the item list from database for dropdown list binding
$AllCategoryName="";
//SEELCT ALL THE DATA FROM CATEGORY TABLE
$queryMainInventory = "SELECT * FROM cat_items ORDER BY item_name";
$resultMain = $conn -> query($queryMainInventory); 
    if ($resultMain -> num_rows > 0) {  
        while ($row = $resultMain -> fetch_assoc()) {
            //SAVED THE VALUES IN AN ARRAY OF OBJECT TO BE USED FOR JAVASCRIPT
            $AllCategoryName .= "{ cat_id:'". $row["cat_id"]."', item_name:'".  $row["item_name"] ."'},";
        }
    }

if (isset($_POST['Deleteitem'])) {
    $itemNameToDelete = $_COOKIE["deleteItem"];//VALUE OF THE ITEM NAME TO BE DeleteED
    setcookie("deleteItem", "", time() - 3600);
    //echo "<script>removeCookies();</script>";
    if (empty($itemNameToDelete)){
        echo '<script>alert("Nothing to delete.")</script>';
    }else{
        //echo $itemName;
      
        $delQUERY="DELETE FROM cat_items  where item_name = '$itemNameToDelete';";  //INSERT ITEM TO THE DATABASE
        if ($conn->query($delQUERY) === TRUE) {
        echo '<script>if(confirm(" '.$itemNameToDelete.' deleted Successfuly!")) {window.location.href = "deleteItemIndex.php"}</script>'; //POP-UP TO SHOW THAT INSERT IS SUCCESFULL AND IT WILL REDIRECT TO THE HHOME PAGE  

        } else {
        echo "Error: Cannot delete ";//IT WILL SHOW ERROR IF THE ITEM ALREADY EXISTS IN THE TABLE
        }  
        $conn->close();//CLOSE THE CONNECTION

        
        
    }

    }



?>

<!-- Javascript to populate in dropdown-->
<script src="js/getDataForDropDown.js"></script>
<!-- Javascript to save data into the object for cookies -->
<script src="js/populateData.js"></script>

<script>   
    let itemAll=document.getElementById("itemAll");//dropdown select

    let allProducts=[<?php echo $AllCategoryName?>];//after the data is binded in the php side, it will be converted to JS variable
    getDataNoAll('itemAll',[...new Set(allProducts.map(product=>product.item_name))]);//call this function saved in getDataForDropDown.js file

       //GET THE VALUE OF THE SELECTED ITEM when the dropdown is changing
       itemAll.addEventListener("change",function(e){
        document.cookie = `deleteItem=${itemAll.value}`;

    })

</script>
