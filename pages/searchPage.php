
<script src="js/cookies.js"></script>
<div style="margin-top:100px;margin-left:50px;">

<link href="css/style.css" rel="stylesheet">

	<?php
		// Report all errors except E_NOTICE
		error_reporting(E_ALL & ~E_NOTICE);
		
        include('./database_connection.php');
        $searchVal=$_COOKIE["searchVal"];//this value is taken from the navigation page when the button is clicked
		//echo "<script>removeCookies();</script>";
		//SELECT FROM THE ITEMS WHERE THE ITEM NAME IS LIKE THE SAVED TEXTBOX VALUE
		$sql = "SELECT * FROM cat_items JOIN category on cat_items.cat_id=category.cat_id WHERE item_name like  '%$searchVal%' or category.cat_name like  '%$searchVal%'";
		$result = $conn -> query($sql);		
		if ($result -> num_rows > 0) {			
		// Build table for display	
			echo "The following items related to $searchVal";	
			echo "<hr>";		
			echo "<table >";
			echo "<tr>";
			echo "<th>No. </th><th>Category Name</th><th>Item Name</th><th>Current Quantity</th>";
			echo "</tr>";
			$i=1;		
			while ($row = $result -> fetch_assoc()) {

                echo "<tr><td>" . $i .
                "</td><td>" . $row["cat_name"] .
					"</td><td>" . $row["item_name"] .
					"</td><td>" . $row["currentCount"] .
					"</td></tr>";

					$i++;
			}							
			echo "</table>";
				
			// Free result set
			$result -> free_result();
		}else{
			echo "No record found.";
		}
		$conn -> close();	
	?>

</div>
