
//this function is used to create table dynamically

function createTable(arr,node){//parameter are arr: array of objects; node: the parent node (tbody)

    let tbody=document.getElementById(node);
    deleteChild(tbody)//delete first the exising table
     //create header

   //loop thru the array to product name
   arr.forEach(element=>{
        //create table elements llike tr,td and append to the tbody
        let mytr=document.createElement("tr"); 

        let td_1_val=document.createElement("td"); 
        let td_2_val=document.createElement("td"); 
        let td_3_val=document.createElement("td");       

        td_1_val.innerHTML=element.itemName;//put the value
        td_2_val.innerHTML=element.currentCount;//put the value
        td_3_val.innerHTML="0";//put the value     

        
        td_3_val.className="pt-3-half";
        td_3_val.contentEditable=true;
        

        mytr.appendChild(td_1_val);  
        mytr.appendChild(td_2_val);  
        mytr.appendChild(td_3_val);      
    
        
        tbody.appendChild(mytr);  

    })

}

//function to delete table children
function deleteChild(node) { 

    let child = node.lastElementChild;  
    while (child) { 
        node.removeChild(child); 
        child = node.lastElementChild; 
    } 
} 

//function to save the items with changed quantity when the table has contents
function getAllCol(tableName,selectedID,typeTxn){

    
       let returnValforTxn=""
       let returnValforMain=""
       //loop through the tables 
       const parentNodesLen=tableName.children.length; //get the length of the table
       for (let i=0;i<parentNodesLen;i++){//loop through the table rows and columns
            let item_name=tableName.children[i].children[0].textContent;   //get the value of the item name. first column is the current count 
            let value_cur=Number(tableName.children[i].children[1].textContent); //get the value of the current count. second column is the current count  
            let value_add_sub=Number(tableName.children[i].children[2].textContent);  //get the value of the current count. third column is the current count 

            let newVal;

            if(typeTxn== `"transaction_bought"`) {//if the transactino is bought = addition
                newVal=value_cur+value_add_sub;
            }
            else if (typeTxn==`"transaction_used"`) {//if the transactino is used = subtraction
                newVal=value_cur-value_add_sub;
            }
                       
            if (value_add_sub>0){ //skip if the value is 0     
                let todayDate = new Date().toISOString().slice(0,10);//get the date today. format yyyy-mm-dd
                returnValforTxn+=`(${selectedID},"${item_name}",${value_add_sub},"${todayDate}"),`//saved to an array
                returnValforMain+=`(${selectedID},"${item_name}",${newVal}),`; //saved to an array 

            }    
       }   
       
       returnValforTxn=returnValforTxn.slice(0, -1);//remove the last comma to be compatible with the sql
       returnValforMain=returnValforMain.slice(0, -1);//remove the last comma to be compatible with the sql
       return [returnValforTxn,returnValforMain];//return as array
   }

