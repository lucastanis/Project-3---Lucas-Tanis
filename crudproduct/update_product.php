<?php

    echo "<h1>Update Product</h1>";
    require_once('functions.php');

    // Test of er op de wijzig-knop is gedrukt 
    if(isset($_POST['btn_wzg'])){
        Updateproduct($_POST);

        //header("location: crud_product.php");
    }

    if(isset($_GET['id'])){  
        // Haal alle info van de betreffende id $_GET['id']
        $id = $_GET['id'];
        $row = Getproduct($id);
    
?>

<html>
    <body>
        <form method="post">
        <br>
        <input type="hidden" name="id" value="<?php echo $row['id'];?>"><br>
        Product:<input type="" name="product" value="<?php echo $row['product'];?>"><br> 
        Beschrijving: <input type="text" name="beschrijving" value="<?= $row['beschrijving']?>"><br>
        Prijs: <input type="text" name="prijs" value="<?= $row['prijs']?>"><br>
        Foto: <input type="text" name="foto" value="<?= $row['foto']?>"><br>

        <!---id: <input type="text" name="id" value="<?= $row['id']?>">-->
        <br><br>
         <input type="submit" name="btn_wzg" value="Wijzigen"><br>
        </form>
        <br><br>
        <a href='crud_product.php'>Home</a>
        
    </body>
</html>

<?php
    } else {
        "Geen id opgegeven<br>";
    }
?>