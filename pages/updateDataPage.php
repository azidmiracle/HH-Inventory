
<!-- FOR UPDATE VALUES-->
<div class=" " id="" style="margin-top:100px;margin-left:50px;">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">    
        <!-- Modal Header -->
        <div class="modal-header ">
            <div class="form-group col-sm">
            <label for="itemAll">Select Products</label>
            <select id="itemAll" name="itemAll" class="form-control chosenSelect" >
            </select>
            <label id="transactionType" name="transactionType"></label>
            </div>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <hr>
                <!-- Editable table -->
                <div class="card">
                <h3 class="card-header text-center font-weight-bold text-uppercase py-4 sticky" id="updateQtyHeader"></h3>
                <div class="card-body">
                    <div id="table" class="table-editable">
                    <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i
                            class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
                    <table class="table table-bordered table-responsive-md table-striped text-center" id="tableData">
                        <thead>
                        <tr>
                            <th class="text-center">Item Name</th>
                            <th class="text-center">Current Quantity</th>
                            <th class="text-center" id="addUsQty"></th>
                        </tr>
                        </thead>
                        <tbody id="tbody">

                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
                <!-- Editable table href="updateDataContinueIndex.php"-->      
            <a class="nav-link btn btn-primary m-5" id="next" >Next</a>

        </div>
      
      </div>
    </div>
</div>

<?php
include('database_connection.php');
$transactionType=$_GET['transactionType'];//this value is taken from the navigation bar. value is either transaction_bought or transaction_used

//get the item list from database for dropdown list binding
$AllCategoryName="";
$queryMainInventory = "SELECT category.cat_id,cat_name,item_name,cat_items.currentCount FROM category JOIN cat_items ON category.cat_id=cat_items.cat_id";
$resultMain = $conn -> query($queryMainInventory); 
    if ($resultMain -> num_rows > 0) {  
        while ($row = $resultMain -> fetch_assoc()) {
            //values are saved in an array of object for javascript usage later
            $AllCategoryName .= "{ cat_id:'". $row["cat_id"]."', CategoryName:'".  $row["cat_name"] ."', itemName:'".  $row["item_name"] ."',currentCount:'". $row["currentCount"]."'},";
        }

    }
?>

<!-- Javascript to populate in dropdown-->
<script src="js/getDataForDropDown.js"></script>
<!-- Javascript to save data into the object for cookies -->
<script src="js/populateData.js"></script>


<script>   
    
    let itemAll=document.getElementById("itemAll");
    let updateQtyHeader=document.getElementById("updateQtyHeader");
    let addUsQty=document.getElementById("addUsQty");     
    let tableData=document.getElementById("tbody");   
    let nextBtn=document.getElementById("next");
    let transactionType = '"<?php echo $transactionType?>"';//get the value of transaction type converting php variable to js variable

    //change the header title and table quantity title based on the type
    if(transactionType== `"transaction_bought"`) {
        updateQtyHeader.textContent="Update Bought Items"
         addUsQty.textContent="Add Quantity"
    }else if (transactionType==`"transaction_used"`) {
        updateQtyHeader.textContent="Update Used Items"
        addUsQty.textContent="Subtract Quantity"
    }

    let allProducts=[<?php echo $AllCategoryName?>];//get the value of all the category  converting php variable to js variable

    var selectedID;
    getData('itemAll',[...new Set(allProducts.map(product=>product.CategoryName))]);//call this function saved in getDataForDropDown.js file
    
    //GET THE VALUE OF THE SELECTED ITEM when the dropdown is changing
    itemAll.addEventListener("change",function(e){
        var selecTedValue = itemAll.value;
        if(selecTedValue=="All"){//if the value selected is all, bind all the selected items
            createTable(allProducts,"tbody")  //bind to the table. js function saved in populateData.js       
        }
        else if(selecTedValue!="All" && selecTedValue!=""){//if not all or not empty, filter the items

            selectedID=allProducts.filter(value=>value.CategoryName==selecTedValue)[0]["cat_id"];//get the category id

            let allSelectedItems=allProducts.filter(product=>product.cat_id===selectedID)//filter the array with a value of the category id
            createTable(allSelectedItems,"tbody") //bind to the table. js function saved in populateData.js         
        }

    })

    //onclick of next button
    nextBtn.addEventListener("click",function(e){
        //get the value from the table
        //create variable for query later
        let returnValforTxn=getAllCol(tableData,selectedID,transactionType)[0];//js getAllColfunction saved in populateData.js.. first index of array
        let returnValforMain=getAllCol(tableData,selectedID,transactionType)[1];//js getAllCol function saved in populateData.js .. second index of array
         
        if (returnValforTxn==""){
            alert("No change in the quantity");
        }else{
        //saved the return value to a cookied for the continue page       
        document.cookie = `dataToInsert=${returnValforTxn}`;
        document.cookie = `dataToInsertMain=${returnValforMain}`;
        document.cookie = 'transactionType=<?php echo $transactionType ?>';
        window.location.href = "updateDataContinueIndex.php"
        }

    })

</script>