<?php
    // auteur: Wigmans
    // functie: wijzig een product op basis van de id
    
    echo "<h1>Update product</h1>";
    require_once('functions.php');

    // Test of er op de wijzig-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_wzg'])){
        Updateproduct($_POST);

        //header("location: update.php?$_POST[NR]");
    }

    if(isset($_GET['id'])){  
        echo "Data uit het vorige formulier:<br>";
        // Haal alle info van de betreffende id $_GET['id']
        $id = $_GET['id'];
        $row = Getproduct($id);
    }
   ?>

<html>
    <<head>
       <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <form method="post">
        <br>
        id:<input type="" name="id" value="<?php echo $row['id'];?>"><br>
        <label for="product"></label>
        <input type="" name="product" id="product"value="<?php echo $row['product'];?>"><br> 
        <label for="soort">Beschrijving</label>
        <input type="text" name="beschrijving" id="beschrijving" value="<?= $row['beschrijving']?>"><br>
        <label for="soort">Email</label>
        <input type="text" name="email" id="email" value="<?= $row['email']?>"><br>
        <label for="alcohol">PLaats</label>
        <input type="text" name="plaats"id="plaats" value="<?= $row['plaats']?>"><br>
         <input type="submit" name="btn_wzg" value="Wijzigen"><br>
        </form>
    </body>
</html>