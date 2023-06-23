<?php
// auteur: Wigmans
// functie: verwijder een bier op basis van de id
include 'functions.php';

// Haal bier uit de database
if(isset($_GET['id'])){
    Deleteproduct($_GET['id']);

    echo '<script>alert("id: ' . $_GET['id'] . ' is verwijderd")</script>';
    echo "<script> location.replace('crud_product.php'); </script>";
}
?>

