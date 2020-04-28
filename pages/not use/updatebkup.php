<link href="css/style.css" rel="stylesheet">
<!-- The Modal for SIGN-IN -->
<div class=" " id="">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header ">
            <div class="form-group col-sm">
            <label for="itemAll">Select Products</label>
            <select id="itemAll" name="itemAll" class="form-control chosenSelect" >
            </select>
            <label id="category_id" name="category_id"></label>
            </div>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <hr>
                <!-- Editable table -->
                <div class="card">
                <h3 class="card-header text-center font-weight-bold text-uppercase py-4 sticky">Update Quantity</h3>
                <div class="card-body">
                    <div id="table" class="table-editable">
                    <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i
                            class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
                    <table class="table table-bordered table-responsive-md table-striped text-center" id="tableData">
                        <thead>
                        <tr>
                            <th class="text-center">Item Name</th>
                            <th class="text-center">Quantity</th>
                        </tr>
                        </thead>
                        <tbody id="tbody">

                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
                <!-- Editable table -->      
            <a class="nav-link btn btn-primary m-5" id="next">Next</a>

        </div>
      
      </div>
    </div>
  </div>


<!-- Modal for DO YOU WANT TO CONTINUE -->   

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
include('./database_connection.php');

//get the item list from database for dropdown list binding
$AllCategoryName="";
$queryMainInventory = "SELECT category.cat_id,cat_name,item_name FROM category JOIN cat_items ON category.cat_id=cat_items.cat_id";
$resultMain = $conn -> query($queryMainInventory); 
    if ($resultMain -> num_rows > 0) {  
        while ($row = $resultMain -> fetch_assoc()) {
            $AllCategoryName .= "{ cat_id:'". $row["cat_id"]."', CategoryName:'".  $row["cat_name"] ."', itemName:'".  $row["item_name"] ."'},";
        }

    }
?>

<?php
include('./database_connection.php');
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
<script src="js/getDataForDropDown.js"></script>
<script src="js/populateData.js"></script>
<script>   

    let itemAll=document.getElementById("itemAll");
    let category_id=document.getElementById("category_id");


    let tableData=document.getElementById("tbody");   

    let nextBtn=document.getElementById("next");
    let allProducts=[<?php echo $AllCategoryName?>];

    getData('itemAll',[...new Set(allProducts.map(product=>product.CategoryName))]);
    //GET THE VALUE OF THE SELECTED ITEM

    itemAll.addEventListener("change",function(e){
        var selecTedValue = itemAll.value;

        if(selecTedValue=="All"){
            createTable(allProducts,"tbody")       
        }
        else if(selecTedValue!="All" && selecTedValue!=""){
            var selectedID=allProducts.filter(value=>value.CategoryName==selecTedValue)[0]["cat_id"];

            let allSelectedItems=allProducts.filter(product=>product.cat_id===selectedID)
            createTable(allSelectedItems,"tbody")          
        }

    })


    //onclick of next button
    nextBtn.addEventListener("click",function(e){
        //get the value from the table
        console.log(getAllCol(tableData));
        document.cookie = `dataToInsert=${getAllCol(tableData)}`
    })

</script>
