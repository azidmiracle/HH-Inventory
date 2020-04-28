
<!-- DIV FOR ADDING ITEMS-->
<div class=" " id=""  style="margin-top:100px">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header ">
            <form method="POST" action="" >
            <div class="form-group col-sm">
            <label for="itemAll">Select Category</label>
            <select id="itemAll" name="itemAll" class="form-control chosenSelect" >
            </select>
            <input  id="cat_id" type="text"  class="form-control mr-sm-2" name="catID" style="display:none">
            <hr>

            <input type="text"  placeholder="Type item name" class="form-control mr-sm-2" name="ItemName" required="">
             <br>
            <input type="submit" value="Add Item"  class="btn btn-success btn-block" name="additem">
            </div>
            </form>
        </div>
           
      </div>
    </div>
  </div>


<?php

include('database_connection.php');

//get the item list from database for dropdown list binding
$AllCategoryName="";
//SEELCT ALL THE DATA FROM CATEGORY TABLE
$queryMainInventory = "SELECT category.cat_id,cat_name FROM category ";
$resultMain = $conn -> query($queryMainInventory); 
    if ($resultMain -> num_rows > 0) {  
        while ($row = $resultMain -> fetch_assoc()) {
            //SAVED THE VALUES IN AN ARRAY OF OBJECT TO BE USED FOR JAVASCRIPT
            $AllCategoryName .= "{ cat_id:'". $row["cat_id"]."', CategoryName:'".  $row["cat_name"] ."'},";
        }
    }

//IF THE ADD ITEM BUTTON IS CLICKED, DATA WILL BE INSEETED INTO THE DATABASE    
if (isset($_POST['additem'])) {

    $cat_id = $_POST["catID"];//value of the category ID. THIS IS HIDDEN
    $itemName = $_POST["ItemName"];//VALUE OF THE ITEM NAME TO BE ADDED
    //$cat_name = $_POST["cat_name"];//VALUE OF THE ITEM NAME TO BE ADDED

    if($cat_id>0){//IF THERE IS A VALUE OF CAT_ID, THEN DO THE FOLLOWING
        $selectQ="SELECT * FROM cat_items WHERE item_name='$itemName';";
        //echo $selectQ;
        $resultMain = $conn -> query($selectQ); 
        if ($resultMain -> num_rows == 0) {  
            $insertQUERY="INSERT INTO cat_items(cat_id,item_name, currentCount) VALUES  ( '$cat_id', '$itemName', 0);";  //INSERT ITEM TO THE DATABASE
            if ($conn->query($insertQUERY) === TRUE) {
    
            echo '<script>if(confirm("Insert Successfuly!")) {window.location.href = "home.php"}</script>'; //POP-UP TO SHOW THAT INSERT IS SUCCESFULL AND IT WILL REDIRECT TO THE HHOME PAGE  
    
            } else {
            echo "Error in inserting data.  ";//IT WILL SHOW ERROR IF THE ITEM ALREADY EXISTS IN THE TABLE
            }
        
            $conn->close();//CLOSE THE CONNECTION
        }else{
            echo "Error: Item $itemName already exists in the database. ";//IT WILL SHOW ERROR IF THE ITEM ALREADY EXISTS IN THE TABLE
        }

    }

    }

?>
<!-- Javascript to populate in dropdown-->
<script src="js/getDataForDropDown.js"></script>
<!-- Javascript to save data into the object for cookies -->
<script src="js/populateData.js"></script>

<script>   

        let itemAll=document.getElementById("itemAll");//dropdown select
        let catID=document.getElementById("cat_id");//category id value

        let allProducts=[<?php echo $AllCategoryName?>];//after the data is binded in the php side, it will be converted to JS variable
        var selectedID;
        getDataNoAll('itemAll',[...new Set(allProducts.map(product=>product.CategoryName))]);//call this function saved in getDataForDropDown.js file

        itemAll.addEventListener("change",function(e){//when the value of the dropdown is changing, category is also changing
            var selecTedValue = itemAll.value;

            selectedID=allProducts.filter(value=>value.CategoryName==selecTedValue)[0]["cat_id"];//get the value of the id from the array of object
            catID.value=selectedID;//set the value of the category ID for used in PHP 
       
            

        })
</script>
