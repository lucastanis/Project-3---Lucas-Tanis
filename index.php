<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "Je moet eerst inloggen!";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Home Pagina</title>
      <link rel="stylesheet" type="text/css" href="style.css">
      <link
         href="https://fonts.googleapis.com/css2?family=Pattaya&family=Poppins:wght@500&display=swap"
         rel="stylesheet"
         />
   </head>
   <body>
      <header>
         <nav>
            <div>
               <h1>XXL</h1>
               <ul>
                  <li><a href="productpagina.php">Producten</a></li>
                  <li><a href="account.php">Account</a></li>
                  <li><a href="contact.php">Contact</a></li>
                  <li><a href="./crudproduct/crud_product.php">CRUD Product</a></li>
               </ul>
            </div>
         </nav>
      </header>
      <main>
      <section class="tbl">
         <article>
            <h4>
               Het beste voor jouw hond!
            </h4>
         </article>
         <button class="button">Shop Hier!</button>
      </section>
   </body>
</html>