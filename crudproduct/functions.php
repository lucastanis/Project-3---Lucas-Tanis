<?php
// auteur: Wigmans
// functie: algemene functies tbv hergebruik
 function ConnectDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "productpagina";
   
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        //echo "Connected successfully";
        return $conn;
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

 }

 
 // selecteer de data uit de opgeven table
 function GetData($table){
    // Connect database
    $conn = ConnectDb();

    // Select data uit de opgegeven table methode query
    // query: is een prepare en execute in 1 zonder placeholders
    // $result = $conn->query("SELECT * FROM $table")->fetchAll();

    // Select data uit de opgegeven table methode prepare
    $query = $conn->prepare("SELECT * FROM $table");
    $query->execute();
    $result = $query->fetchAll();

    return $result;
 }

 // selecteer de rij van de opgeven id uit de table product
 function GetProduct($id){
    // Connect database
    $conn = ConnectDb();

    // Select data uit de opgegeven table methode prepare
    
    $query = $conn->prepare("SELECT * FROM product WHERE id = :id");
    $query->execute([':id'=>$id]);
    $result = $query->fetch();

    return $result;
 }


 function Ovzproduct(){

    // Haal alle product record uit de tabel 
    $result = GetData("product");
    
    //print table
    PrintTable($result);
    //PrintTableTest($result);
    
 }

 
// Function 'PrintTable' print een HTML-table met data uit $result.
function PrintTable($result){
    // Zet de hele table in een variable en print hem 1 keer 
    $table = "<table border = 1px>";

    // Print header table

    // haal de kolommen uit de eerste [0] van het array $result mbv array_keys
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor=gray>" . $header . "</th>";   
    }

    // print elke rij
    foreach ($result as $row) {
        
        $table .= "<tr>";
        // print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        $table .= "</tr>";
    }
    $table.= "</table>";

    echo $table;
}


function Crudproduct(){

    // Menu-item   insert
    $txt = "
    <h1>Crud product</h1>
    <nav>
		<a href='insert_product.php'>Toevoegen nieuw product</a>
    </nav>";
    echo $txt;

    // Haal alle product record uit de tabel 
    $result = GetData("product");

    //print table
    PrintCrudproduct($result);
    
 }
 // Function 'PrintCrudproduct' print een HTML-table met data uit $result 
 // en een wzg- en -verwijder-knop.
function PrintCrudproduct($result){
    // Zet de hele table in een variable en print hem 1 keer 
    $table = "<table border = 1px>";

    // Print header table

    // haal de kolommen uit de eerste [0] van het array $result mbv array_keys
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor=gray>" . $header . "</th>";   
    }
    $table .= "</tr>";

    // print elke rij
    foreach ($result as $row) {
        
        $table .= "<tr>";
        // print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
            
        }
        
        // Wijzig knopje
        $table .= "<td>". 
            "<form method='post' action='update_product.php?id=$row[id]' >       
                    <button name='wzg'>Wzg</button>	 
            </form>" . "</td>";

        // Delete via linkje href
        $table .= '<td><a href="delete_product.php?id='.$row["id"].'">verwijder</a></td>';
        
        $table .= "</tr>";
    }
    $table.= "</table>";

    echo $table;
}


function Updateproduct($row){
       
    try{
        // Connect database
        $conn = ConnectDb();
        
        // Update data uit de opgegeven table methode prepare
        $sql = "UPDATE product
        SET 
            product = '$row[product]', 
            beschrijving = '$row[beschrijving]', 
            prijs = '$row[prijs]',
            foto = '$row[foto]'
        WHERE id = $row[id]";
        
        $query = $conn->prepare($sql);
        $query->execute();
        
    }

    catch(PDOException $e) {
        echo "Update failed: " . $e->getMessage();
    }
}

function Insertproduct($post){
    try {
        $conn = ConnectDb();

        
        $query = $conn->prepare("
        INSERT INTO product (product, beschrijving, prijs, foto) 
        VALUES (:product, :beschrijving, :prijs, :foto)");

        //Oplossing 2
        $query->execute(
            [
                ':product'=>$post['product'],
                ':beschrijving'=>$post['beschrijving'],
                ':prijs'=>$post['prijs'],
                ':foto'=>$post['foto'],

            ]
        );
    }

    catch(PDOException $e) {
        echo "Insert failed: " . $e->getMessage();

    }
}

function Deleteproduct($id){
    echo "Delete row<br>";
    try{
        // Connect database
        $conn = ConnectDb();
        
        // Update data uit de opgegeven table methode prepare
        $sql = "DELETE FROM product
                WHERE id = '$id'";
                
        $query = $conn->prepare($sql);
        $result = $query->execute();

    }

    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();

    }
}

function dropDown2($label, $data, $row_selected=-1){
    $text = "<label for='$label'>Choose a $label:</label>
            <select name='$label' id='$label'>";

    foreach($data as $row){
        $text .= "<option value='$row[brouwcode]'>$row[product]</option>\n";
    }

    $text .= "</select>";

    echo "$text";

}

function dropDownBrouwer($label, $row_selected){
    $data = GetData('brouwer');
    $txt = "
    <label for='$label'>Choose a $label:</label>
        <select name='$label' id='$label'>";

    foreach($data as $row){
        if ($row['brouwcode'] == $row_selected){
            $txt .= "<option value='$row[brouwcode]' selected='selected'>$row[product]</option>\n";
        } else {
            $txt .= "<option value='$row[brouwcode]'>$row[product]</option>\n";
        }
        
    }

    $txt .= "</select>";

    echo $txt;
    
}

?>