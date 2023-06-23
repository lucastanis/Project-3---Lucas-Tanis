<?php
    echo "<h1>Insert Product</h1>";

    require_once('functions.php');
	 
	 

    // Test of er op de insert-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_ins'])){
		 
        Insertproduct($_POST);
        echo '<script>alert("Bierproduct: ' . $_POST['product'] . ' is toegevoegd")</script>';
        //echo "<script> location.replace('crud_product.php'); </script>";
    }
?>

<html>
    <body>
        <form method="post">
        <br>
        Product:<input type="" name="product"><br> 
        Beschrijving: <input type="text" name="beschrijving"><br>
        Prijs: <input type="text" name="prijs"><br>
        Foto: <input type="text" name="foto"><br>
        <br>
        <input type="submit" name="btn_ins" value="Insert"><br>
        </form>
        <br><br>
        <a href='crud_product.php'>Home</a>
    </body>
</html>
