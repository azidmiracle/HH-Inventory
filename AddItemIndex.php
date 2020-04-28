<?php
if(isset($_POST['catID'])){
    $cat_id = $_POST['catID'];
   }
   if(isset($_POST['ItemName'])){
    $itemName = $_POST['ItemName'];
   }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Household Inventory</title>

    <!-- Bootstrap core CSS -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
  <?php
        include('pages/nav_2.php');
        include('pages/addItemPage.php');
        include('pages/footer.php');
    ?>
</body>
</html>
