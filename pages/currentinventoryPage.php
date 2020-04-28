
<link href="css/style.css" rel="stylesheet">
<script src="js/goBack.js"></script>
<?php
//get the value of the category from the home page when the button is clicked
$categoryName=$_GET["category"];//value is 1,2,3,4,5,6,7,8
?>

<div style="margin-top:100px;margin-left:50px;">

	<button onclick='window.location.href = "home.php"' class="btn btn-primary  mr-sm-2">Back</button>	
	<hr>

	<?php
		include('./database_connection.php');

		//SELECT DATA FROM THE CAT_ITEMS TABLE WHERE THE ID IS EQUAL TO THE CLICKED CATEGORY

		$sql = "SELECT * FROM cat_items WHERE cat_items.cat_id=$categoryName";
		$result = $conn -> query($sql);		
		if ($result -> num_rows > 0) {			
		// Build table for display				
			echo "<table >";
			echo "<tr>";
			echo "<th>No. </th><th>Item Name</th><th>Current Quantity</th>";
			echo "</tr>";
			$i=1;		
			while ($row = $result -> fetch_assoc()) {

				echo "<tr><td>" . $i .
					"</td><td>" . $row["item_name"] .
					"</td><td>" . $row["currentCount"] .
					"</td></tr>";
					$i++;
			}							
			echo "</table>";
				
			// Free result set
			$result -> free_result();
		}
		$conn -> close();	
	?>
</div>
